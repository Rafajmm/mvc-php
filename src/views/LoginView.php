<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Mi Biblioteca</title>
    <link href="<?= URL_ASSETS ?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center">Iniciar Sesión</h3>
                        <form action="index.php?action=procesarLogin" method="POST">
                            <div class="mb-3">
                                <label>Nombre de usuario</label>
                                <input type="text" name="usuario" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>