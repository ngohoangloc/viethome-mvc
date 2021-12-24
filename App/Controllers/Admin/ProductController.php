<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Http\Paginator;
use App\Http\Response;
use App\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends BaseController
{

    public function product()
    {
        if (!check_login()) {
            $this->redirect("/login");
        } else {
            if (auth()->user_role == "admin") {
                $items = Product::paginate($this->getPerPage());
                $total = Product::count();

                $categories = $this->getCategories();

                $paginator = new Paginator($this->request, $items, $total);

                $paginator->onEachSide(2);

                return $this->render('admin/product/product', [
                    'items' => $items,
                    'paginator' => $paginator,
                    'categories' => $categories
                ]);
            } else {
                $this->redirect("/");
            }
        }
    }

    public function searchProduct()
    {
        if (!check_login()) {
            $this->redirect("/login");
        } else {
            if (auth()->user_role == "admin") {
                $search = $this->request->get('q');

                $items = Product::where('name', 'LIKE', "%$search%")->get();
                $total = $items->count();

                $categories = $this->getCategories();

                $paginator = new Paginator($this->request, $items, $total);

                $paginator->onEachSide(2);

                return $this->render('admin/product/product', [
                    'items' => $items,
                    'paginator' => $paginator,
                    'categories' => $categories
                ]);
            } else {
                $this->redirect("/");
            }
        }
    }

    public function deleteProduct()
    {
        $id = $this->request->post('id');
        $product = Product::find($id);

        if ($product) {
            if ($product->delete()) {
                session()->setFlash(\FLASH::SUCCESS, $product->name . 'has been deleted successfully.');
            } else {
                session()->setFlash(\FLASH::ERROR, "Unable to delete Product");
            }
        } else {
            session()->setFlash(\FLASH::ERROR, "Product ID does not exists!");
        }

        $return_url = $this->request->post('return_url', '/');
        return $this->redirect($return_url);
    }

    public function showInsertProduct()
    {
        if (!check_login()) {
            $this->redirect("/login");
        } else {
            if (auth()->user_role == "admin") {
                $categories = $this->getCategories();

                return $this->render('admin/product/product-insert', [
                    'categories' => $categories
                ]);
            } else {
                $this->redirect("/");
            }
        }
    }

    public function insertProduct()
    {
        $isSuccess = false;
        $errors = [];

        $params = $this->getParams();

        $pattern = '/^[0-9]{1,15}$/';
        if (!preg_match($pattern, $params['price'])) {
            $errors['price'] = 'Invalid price format!';
        }

        if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0) {
            $target_dir    = "assets/img/products/";
            $target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);

            $allowUpload   = true;

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $allowtypes    = array('jpg', 'png', 'jpeg');

            $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);

            if ($check !== false) {
                $allowUpload = true;
            } else {
                $allowUpload = false;
            }

            if (file_exists($target_file)) {
                $errors['thumbnail'] = 'Tên file đã tồn tại trên hệ thống!';
                $allowUpload = false;
            }

            if (!in_array($imageFileType, $allowtypes)) {
                $errors['thumbnail'] = 'Chỉ được upload các định dạng JPG, PNG, JPEG!';
                $allowUpload = false;
            }

            if ($allowUpload && empty($errors)) {
                if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                    $errors['thumbnail'] = 'Có lỗi xảy ra khi upload file!';
                }
            }
        } else {
            $errors['thumbnail'] = 'Chưa Upload hình ảnh sản phẩm hoặc upload thất bại!';
        }


        if (empty($errors)) {

            $new_product = new Product;

            if ($new_product) {
                $new_product->name = $params['name'];
                $new_product->price = $params['price'];
                $new_product->description = $params['description'];
                $new_product->category_id = $params['category_id'];
                $new_product->thumbnail = 'assets/img/products/' . $_FILES['thumbnail']['name'];

                $new_product->save();
            }

            if ($new_product) {
                $isSuccess = true;
            } else {
                $errors['failed'] = 'Add failes. Something went wrong, please try again.';
            }
        }
        $view = 'admin/product/product-insert';
        $categories = $this->getCategories();
        $data = [
            'errors'    => $errors,
            'params'    => $params,
            'categories'    =>  $categories
        ];

        if ($isSuccess) {

            session()->setFlash(\FLASH::SUCCESS, 'Add success!');
            $this->redirect("/admin/product");
        } else {
            echo $this->render($view, $data);
        }
    }

    public function showEditForm()
    {
        if (!check_login()) {
            $this->redirect("/login");
        } else {
            if (auth()->user_role == "admin") {
                $id = $this->request->get('id');

                $product = Product::find($id);
                $categories = $this->getCategories();

                return $this->render('admin/product/product-update', [
                    'params'   =>  $product,
                    'categories' => $categories
                ]);
            } else {
                $this->redirect("/");
            }
        }
    }

    public function updateProduct()
    {
        $isSuccess = false;
        $errors = [];

        $params = $this->getParams();

        $pattern = '/^[0-9]{1,15}$/';
        if (!preg_match($pattern, $params['price'])) {
            $errors['price'] = 'Invalid price format!';
        }

        if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0) {
            $target_dir    = "assets/img/products/";
            $target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);

            $allowUpload   = true;

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $allowtypes    = array('jpg', 'png', 'jpeg');

            $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);

            if ($check !== false) {
                $allowUpload = true;
            } else {
                $allowUpload = false;
            }

            if (file_exists($target_file)) {
                unlink("assets/img/products/".$_FILES["thumbnail"]["name"]);
            }

            if (!in_array($imageFileType, $allowtypes)) {
                $errors['thumbnail'] = 'Chỉ được upload các định dạng JPG, PNG, JPEG!';
                $allowUpload = false;
            }

            if ($allowUpload && empty($errors)) {
                if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                    $errors['thumbnail'] = 'Có lỗi xảy ra khi upload file!';
                }
            }
        }


        if (empty($errors)) {
            $id = $this->request->post('id');
            $update_product = Product::find($id);

            if ($update_product) {
                $update_product->name = $params['name'];
                $update_product->price = $params['price'];
                $update_product->description = $params['description'];
                $update_product->category_id = $params['category_id'];
                $update_product->thumbnail = 'assets/img/products/' . $_FILES['thumbnail']['name'];

                $update_product->save();
            }

            if ($update_product) {
                $isSuccess = true;
            } else {
                $errors['failed'] = 'Add failes. Something went wrong, please try again.';
            }
        }
        $view = 'admin/product/product-insert';
        $categories = $this->getCategories();
        $data = [
            'errors'    => $errors,
            'params'    => $params,
            'categories'    =>  $categories
        ];

        if ($isSuccess) {

            session()->setFlash(\FLASH::SUCCESS, 'Update success!');
            $this->redirect("/admin/product");
        } else {
            echo $this->render($view, $data);
        }
    }

    public function getParams()
    {
        return [
            'name'          =>  $this->request->post('name'),
            'price'             =>  $this->request->post('price'),
            'description'          =>  $this->request->post('description'),
            'category_id'  =>  $this->request->post('category_id'),
            'thumbnail'  =>  $this->request->post('thumbnail')
        ];
    }

    public function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }
}
