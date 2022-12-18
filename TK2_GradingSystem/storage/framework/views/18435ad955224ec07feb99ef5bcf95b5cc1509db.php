   
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('grade.index')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
  
    <form action="<?php echo e(route('grade.update',$grade->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo e($grade->nama); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nim:</strong>
                <input type="text" name="nim" class="form-control" placeholder="nim" value="<?php echo e($grade->nim); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>jurusan:</strong>
                <input type="text" class="form-control" name="jurusan" placeholder="jurusan" value="<?php echo e($grade->jurusan); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Quiz:</strong>
                <input id="quiz" type="number" min="0" max="100" class="form-control" name="quis" placeholder="0" value="<?php echo e($grade->quis); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Tugas:</strong>
                <input id="tugas" type="number" min="0" max="100" class="form-control" name="tugas" placeholder="0" value="<?php echo e($grade->tugas); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Absensi:</strong>
                <input id="absensi" type="number" min="0" max="100" class="form-control" name="absensi" placeholder="0" value="<?php echo e($grade->absensi); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Praktek:</strong>
                <input id="praktek" type="number" min="0" max="100" class="form-control" name="praktek" placeholder="0" value="<?php echo e($grade->praktek); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Uas:</strong>
                <input id="uas" type="number" min="0" max="100" class="form-control" name="uas" placeholder="0" value="<?php echo e($grade->uas); ?>">
            </div>
        </div>
        <input id="grade" type="hidden" name="grade" value="<?php echo e($grade->grade); ?>">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button id="submitdata" type="submit" class="btn btn-primary" disabled>Submit</button>
                <a class="btn btn-secondary" onclick="grade()">Check</a>
            </div>
        </div>
   
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mhs.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /tmp/TK2_GradingSystem/resources/views/mhs/edit.blade.php ENDPATH**/ ?>