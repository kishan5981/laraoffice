<script src="<?php echo e(asset('adminlte/plugins/ckeditor/ckeditor.js')); ?>"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=<?php echo e(csrf_token()); ?>',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=<?php echo e(csrf_token()); ?>'
            });
        });
    </script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/admin/common/standard-ckeditor.blade.php ENDPATH**/ ?>