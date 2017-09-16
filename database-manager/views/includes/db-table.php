<h2>Databases</h2>
  <div class="btn-group btn-group-lg">
    <button type="button" class="btn btn-primary" onclick="dbm.general.delete()">Delete</button>
    <button type="button" class="btn btn-primary" onclick="dbm.general.edit()">Edit</button>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th><input type="checkbox"></th>
          <th>#</th>
          <th>Database</th>
          <th>JSON</th>
        </tr>
      </thead>
      <tbody id="databases">
      </tbody>
    </table>
    <img src="img/triangle_square_animation.gif" alt="loading..." class="loader"/>