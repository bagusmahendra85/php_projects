<div class="container mt-5">
  <div class="row">
    <div class="col-6">
      <h3>Employee Lists</h3>
      <div class="mt-3">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Employee ID</th>
              <th scope="col">Name</th>
              <th scope="col">Civil ID</th>
              <th scope="col">Email</th>
              <th scope="col">Department</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            foreach ($data["employees"] as $employee) : ?>
            <tr>
              <th scope=row><?= $i++ ?></th>
              <td><?= $employee["employee_id"] ?></td>
              <td><?= $employee["name"] ?></td>
              <td><?= $employee["civil_id"] ?></td>
              <td><?= $employee["email"] ?></td>
              <td><?= $employee["department"] ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>