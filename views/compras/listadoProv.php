<section class="content-header">
    <h1>
        Búsqueda de Compras por Proveedor
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <a  href="views/reportes/ComprasProv.php" role="button" class="btn btn-delete"><span class="fa fa-file-pdf-o"></span> Imprimir</a>
    </section>
    <hr>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form action="" method="POST" class="inline" role="form">
                    <div class="form-group">
                        <legend>Buscar por Rif</legend>
                    </div>
                    <div class="col-sm-8">
                        <input name="rif" type="text" class="form-control" placeholder="Indique su rif" value="">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
        </form>
        
    </div>

</div><br><br><br>
<div class="row">
    <div class="col-xs-12">
    <div class="container tabla ">
        <table class="table compact cell-border hover row-border table-striped display "  id="example1"  cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Rif</th>
                <th>Proveedor</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <?php foreach($compras as $f): ?>
                        <tr>

                            <td><?php echo $f['rif']; ?></td>
                            <td><?php echo $f['prov']; ?></td>
                            <td><?php echo $f['total']; ?></td>
                        </tr>

                    <?php endforeach; ?>

        </table>
    </div>
    </div>
</div>