<?php
/**
 * Controller User
 * Mengatur tampilan daftar user dan detail user
 */
class UserController {
    private $userModel;

    // Constructor - buat object User model
    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    // Method utama - routing berdasarkan parameter action dan id
    public function index() {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'create':
                    $this->create();
                    break;
                case 'edit':
                    if (isset($_GET['id'])) {
                        $this->edit($_GET['id']);
                    } else {
                        $this->list();
                    }
                    break;
                case 'delete':
                    if (isset($_GET['id'])) {
                        $this->delete($_GET['id']);
                    } else {
                        $this->list();
                    }
                    break;
                default:
                    $this->list();
            }
        } elseif (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->detail($_GET['id']);
        } else {
            $this->list();
        }
    }

    // Tampilkan daftar semua user
    private function list() {
        $users = $this->userModel->getAllUsers();
        require_once __DIR__ . '/../views/list.php';
    }

    // Tampilkan detail user berdasarkan id
    private function detail($id) {
        $user = $this->userModel->getUserById($id);
        require_once __DIR__ . '/../views/detail.php';
    }

    // Tampilkan form untuk membuat user baru
    private function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            if ($this->userModel->insertUser($name, $email)) {
                header('Location: index.php');
                exit;
            }
        }
        require_once __DIR__ . '/../views/create.php';
    }

    // Tampilkan form untuk edit user
    private function edit($id) {
        $user = $this->userModel->getUserById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            if ($this->userModel->updateUser($id, $name, $email)) {
                header('Location: index.php');
                exit;
            }
        }
        require_once __DIR__ . '/../views/edit.php';
    }

    // Hapus user berdasarkan id
    private function delete($id) {
        if ($this->userModel->deleteUser($id)) {
            header('Location: index.php');
            exit;
        }
    }
}
