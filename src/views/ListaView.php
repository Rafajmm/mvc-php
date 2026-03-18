<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Biblioteca</title>
    <link href="<?= URL_ASSETS ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL_ASSETS ?>bootstrap-icons/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0">Mi Biblioteca</h2>
                        <span class="badge bg-light text-primary"><?php echo count($libros); ?> Libros</span>
                    </div>
                    <a href="index.php?action=logout" class="btn btn-danger btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Salir
                    </a>
                </div>
                <div class="card-body">
                    
                    <form action="index.php?action=nuevo" method="POST" class="row g-3 mb-4">
                        <div class="col-md-5">
                            <input type="text" name="titulo" class="form-control" placeholder="Título del libro" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="autor" class="form-control" placeholder="Autor" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-plus-circle"></i> Agregar
                            </button>
                        </div>
                    </form>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($libros as $l): ?>
                                <tr>
                                    <td><span class="text-muted small">#<?= $l['id'] ?></span></td>
                                    <td><strong><?= $l['titulo'] ?></strong></td>
                                    <td><?= $l['autor'] ?></td>
                                    <td class="text-center">
                                        <a href="index.php?action=marcarLeido&id=<?= $l['id'] ?>" 
                                           class="btn btn-sm <?= $l['leido'] ? 'btn-outline-success' : 'btn-outline-secondary' ?>">
                                            <?= $l['leido'] ? '<i class="bi bi-check-all"></i> Leído' : '<i class="bi bi-book"></i> Pendiente' ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="index.php?action=borrar&id=<?= $l['id'] ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('¿Eliminar este libro?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if(empty($libros)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No hay libros en tu biblioteca todavía.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>