 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tugas TK2 Grading System</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('grade.create')); ?>"> Tambah Data</a>
            </div>
        </div>
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Nim</th>
            <th>Jurusan</th>
            <th>Grade</th>
            <th width="280px">Action</th>
        </tr>
        <script>var data = [];</script>
        <?php $__currentLoopData = $Grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($Grade->nama); ?></td>
            <td><?php echo e($Grade->nim); ?></td>
            <td><?php echo e($Grade->jurusan); ?></td>
            <td><?php echo e($Grade->grade); ?></td>
            <script>data.push("<?php echo e($Grade->grade); ?>");</script>
            <td>
                <form action="<?php echo e(route('grade.destroy',$Grade->id)); ?>" method="POST">
   
                    <a class="btn btn-info" href="<?php echo e(route('grade.show',$Grade->id)); ?>">Show</a>
    
                    <a class="btn btn-primary" href="<?php echo e(route('grade.edit',$Grade->id)); ?>">Edit</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <canvas id="bar-chart"></canvas>
    <script>
        counts = {};
  data.forEach(function (x) { counts[x] = (counts[x] || 0) + 1; });
  const ctx = document.getElementById('bar-chart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Grade A', 'Grade B', 'Grade C', 'Grade D'],
      datasets: [{
        label: 'Grading System Chart',
        data: [counts['A'], counts['B'], counts['C'], counts['D']],
        backgroundColor: ["green", "blue", "yellow", "red"],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  
</script>
    <?php echo $Grades->links(); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mhs.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /tmp/TK2_GradingSystem/resources/views/mhs/index.blade.php ENDPATH**/ ?>