<div class="modal fade" id="modalCreateTopic" tabindex="-1" aria-labelledby="modalCreateTopicLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTopicLabel">Creae Topic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCreateTopic" class="needs-validation" novalidate action="{{ route('admin.topic.store') }}" method="POST">
                   @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="topicName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="topicName" placeholder="Topic Name"
                                            name="name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Name cannot be empty
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="topicDesc" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="topicDesc" placeholder="Topic Desc"
                                            name="desc" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Description cannot be empty
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <label for="thumbnailUrl" class="form-label">Thumbnail</label> <br>
                                    <input type="text" class="form-control" id="topicThumbnailUrl" hidden
                                        name="thumbnail" value="">
                                    <div class="thumnail-upload-box">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="#" id="uploadTopicThumbnail" class="btn btn-info">Upload</a>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="thumbnail-upload">
                                                    <img src="" id="previewTopicThumbnail" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="meta-title" class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" id="meta-title"
                                            placeholder="Meta title" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Meta title cannot be empty
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="meta-desc" class="form-label">Meta Description</label>
                                        <textarea name="meta_desc" class="form-control" id="meta-desc" required></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Meta Description cannot be empty
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="meta-key" class="form-label">Meta Keywords</label>
                                        <input type="text" name="meta_key" class="form-control" id="meta-key"
                                            placeholder="Keywords" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Meta keywords cannot be empty
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="border-color" class="form-label">Border Color</label>
                                        <input type="color" name="border_color" class="form-control" id="border-color"
                                            placeholder="Border Color" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="formCreateTopic" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>