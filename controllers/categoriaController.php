<?php 

    require_once('../config/conexion.php');
    require_once('../models/CategoriaModel.php');

    $categoriaModel = new CategoriaModel;
    
    switch ($_GET['op']) {
        
        case 'getAll':
            $response = $categoriaModel->getAll_categorias();
            echo json_encode($response);
        break;

        case 'getOne':
            $response = $categoriaModel->getOne_categoria($_GET['id']);
            echo json_encode($response);
        break;

        case 'inser':
            $data = file_get_contents('php://input');
            $response = $categoriaModel->insetCategoria($data);
            echo json_encode($response);
        break;

        case 'update':
            $data = file_get_contents('php://input');
            $response = $categoriaModel->updateCategoria($data);
            echo json_encode($response);
        break;

        case 'delete':
            $data = file_get_contents('php://input');
            $response = $categoriaModel->deleteCategoria($data);
            echo json_encode($response);
        break;
        
        default:
            # code...
            break;
    }