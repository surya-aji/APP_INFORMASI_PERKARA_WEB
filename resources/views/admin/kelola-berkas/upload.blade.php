
@extends('admin.layout.master')
@section('content')
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper pr-0">
                <div class="content-header row">
                </div>
                
                    <!-- remove all thumbnails file upload starts -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Unggah Dokumen</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">Unggah Dokumen / Produk Akhir Untuk Nomor Perkara <strong>{{$nom->noper}}</strong></p>
                                        <form action="{{route('upload',$id)}}"  method="post" enctype="multipart/form-data">
                                            @csrf
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Pilih Dokumen</label>
                                                <div class="custom-file">
                                                    <input type="file" name='file' class="custom-file-input" id="inputGroupFile01" required accept=".doc,pdf">
                                                    <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-primary">Unggah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- remove all thumbnails file upload ends -->

            </div>
        </div>

       <script type="text/javascript">

        
                document.addEventListener("DOMContentLoaded", function() {
                        
                /*****************************************************
                *               Remove All Thumbnails                *
                *****************************************************/
                Dropzone.options.dpzRemoveAllThumb = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 10, // MB
                addRemoveLinks: true,
                acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
                init: function () {

                    // Using a closure.
                    var _this = this;

                    // Setup the observer for the button.
                    $("#clear-dropzone").on("click", function () {
                    // Using "_this" here, because "this" doesn't point to the dropzone anymore
                    _this.removeAllFiles();
                    // If you want to cancel uploads as well, you
                    // could also call _this.removeAllFiles(true);
                    }); 
                }
                }

        });
        </script>


@endsection('content')
