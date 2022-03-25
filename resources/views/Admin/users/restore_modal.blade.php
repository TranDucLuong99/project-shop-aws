<?php
/**
 * @var  App\Models\user $users
 * @var \App\Models\user $key
 */
?>

<div class="row">

    <!-- Modal delete-->
    <div class="modal modal-danger fade" id="restore" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hiển thị lại user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('user.restore')}}" method="post">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Bạn có muốn hiển thị lại user có id =  <span  style="font-weight: bold">{{$key->id}}</span> ?
                        </p>
                        <input type="hidden" name="id" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel
                        </button>
                        <button type="submit" class="btn btn-warning">Yes, Show</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

@push('js')
    <script>
        $('#restore').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            //   console.log(event.relatedTarget);
            var id = button.data('user_id');
            /*  console.log(user_id);*/
            var modal = $(this);
            /*      console.log(modal);
                  console.log(modal.find('.modal-body #user_id'));*/
            modal.find('.modal-body input').val(id);
            modal.find('.modal-body span').html(id);
        });
    </script>
@endpush
