<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register Akun</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="form-group row" id="perinput">
                                <label class="col-sm-3 col-form-label">Username:</label>
                                <div class="col-sm-9">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username">
                                </div>
                            </div>

                            <div class="form-group row" id="perinput">
                                <label class="col-sm-3 col-form-label">Password:</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control input-focus" placeholder="Input Password" aria-label="Input Password" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Perbarui</button>
                    </div>


                </div>
            </div>
        </div>
        <!-- @if(session('show_modal'))
    <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
    </script> -->

        @endif