<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('global.app_csvImport'); ?></h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-md-12'>

                        <form class="form-horizontal" method="POST" action="<?php echo e(route('admin.csv_parse', ['model' => $model])); ?>"
                              enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="operation" value="<?php echo e($operation ?? ''); ?>">
                            <input type="hidden" name="duplicatecheck" value="<?php echo e($duplicatecheck ?? ''); ?>">
                            <input type="hidden" name="contact_type" value="<?php echo e($contact_type ?? ''); ?>">

                            <div class="form-group<?php echo e($errors->has('csv_file') ? ' has-error' : ''); ?>">
                                <label for="csv_file"
                                       class="col-md-4 control-label"><?php echo app('translator')->get('global.app_csv_file_to_import'); ?></label>

                                <div class="col-md-6">
                                    <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                                    <?php if($errors->has('csv_file')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('csv_file')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="header" checked> <?php echo app('translator')->get('global.app_file_contains_header_row'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo app('translator')->get('global.app_parse_csv'); ?>
                                    </button>
                                     <?php if( ! empty( $csvtemplatepath ) ): ?>
                                       <?php echo $__env->make('csvImport.downloadtemplate', compact('csvtemplatepath'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                     <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/csvImport/modal.blade.php ENDPATH**/ ?>