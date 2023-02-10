
<div class="container mt-5">
          <table class="table table-light">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fabricante</th>
                <th scope="col">Ano lanzamiento</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($naves as $nave):?>
              <tr>
                <th scope="row"><?php echo $nave['id']?></th>
                <td><?php echo $nave['nombre']?></td>
                <td><?php echo $nave['fabricante']?></td>
                <td><?php echo $nave['ano_lanzamiento']?></td>
                
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
</div>


