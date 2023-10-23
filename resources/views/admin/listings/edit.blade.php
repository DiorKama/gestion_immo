<x-master-layout>
    @section('page-title', __('Modifier une annonce'))

    @section('page-header-title', __('Modifier :listing', [
        'listing' => $listing->title
    ]))

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <form action="{{ route('admin.listings.update', $listing) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                                <h3 class="card-title">{{ __('Modifier :listingTitle', [
                                    'listingTitle' => $listing->title
                                ]) }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Erreur survenue. Merci de réessayer !
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Titre Annonce') }}</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $listing->title) }}" placeholder="{{ __('Titre Annonce...') }}" required>
                                    @error("title")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Catégorie parent') }}</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="">{{ __('Séléctionnez ...') }}</option>
                                        @foreach($_listingCategories as $_category)
                                            @if ( isset($_category['children']) && !empty($_category['children']) )
                                                <optgroup label="{{ $_category["category"]->title }}">
                                                    @foreach($_category['children'] as $child)
                                                        <option value="{{ $child["category"]->id }}" @selected(old('category_id', $listing->category_id) == $child["category"]->id)>{{ $child["category"]->title }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option value="{{ $_category["category"]->id }}">{{ $_category["category"]->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error("category_id")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Localité') }}</label>
                                    <select class="form-control @error('location_id') is-invalid @enderror" name="location_id">
                                        <option value="">{{ __('Séléctionnez ...') }}</option>
                                        @foreach($_locations as $_location)
                                            @if ( isset($_location['children']) && !empty($_location['children']) )
                                                <optgroup label="{{ $_location["title"] }}">
                                                    @foreach($_location['children'] as $child)
                                                        <option value="{{ $child["id"] }}" @selected(old('location_id', $listing->location_id) == $child["id"])>{{ $child["title"] }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option value="{{ $_location["id"] }}">{{ $_location["title"] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error("location_id")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Description') }}</label>
                                    <textarea
                                        name="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                    >{{ old('description', $listing->description) }}</textarea>
                                    @error("description")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Prix') }}</label>
                                    <div class="input-group mb-2">
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $listing->price) }}" placeholder="Prix du bien ...">
                                        <div class="input-group-append">
                                            <div class="input-group-text">{{ __('Frs CFA') }}</div>
                                        </div>
                                    </div>
                                    @error("price")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Modifier') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Téléchargez des photos de votre annonce') }}</h3>
                        </div>
                        <div class="card-body">
                            <?php $groups = upload_config(null, []); ?>

                            @foreach ($groups as $group => $groupConfig)
                                @php
                                    $filesCount = collect($listing->files)
                                        ->where('group', $groupConfig['file_group'])->count();
                                @endphp

                                <div class="user-page__title">
                                    Télécharger des photos de votre annonce
                                </div>

                                <div class="user-page__subtitle">
                                    <p>Une annonce avec une image de qualité obtient plus de visibilité et augmente vos chances de vendre plus rapidement.
                                        Les annonces avec photo attirent 5 fois plus de clients.</p>
                                </div>

                                <div
                                    data-file-upload data-file-upload-min-files="{{ $groupConfig['min'] }}"
                                    data-file-upload-max-files="{{ $groupConfig['max'] }}"
                                    data-file-upload-max-size="{{ $groupConfig['max_size'] }}"
                                    data-file-upload-types="{{ implode(",", $groupConfig['file_types']) }}"
                                    data-file-upload-uploaded-previews="{{ route(
                                        'admin.listings.photos.previews',
                                        [
                                            'listing' => $listing,
                                            'group' => $group,
                                        ]
                                    ) }}"
                                >

                                    <div class="dropzone dropzone--post-listing">
                                        @include(
                                            'admin.listings.partials._photos._upload',
                                            [
                                                'group' => $group,
                                                'groupConfig' => $groupConfig,
                                            ]
                                        )
                                    </div>

                                    @include(
                                        'admin.listings.partials._photos._list',
                                        [
                                            'group' => $group,
                                            'groupConfig' => $groupConfig,
                                            'actions' => true,
                                        ]
                                    )

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('footer-scripts')
        <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

        <script type="text/javascript">
            (function($) {
                $.fn.fileUpload = function (options) {
                    var self = this;

                    self.dropzone = null;

                    self.countUploadedFiles = function () {
                        var count = 0;
                        count += self.dropzone.getUploadingFiles().length;
                        count += self.find(options.uploadedPreviewContainer)
                            .find(options.uploadedPreviewItem)
                            .filter(':visible').length;

                        $.each(self.dropzone.getAcceptedFiles(), function (index, file) {
                            if (file.status === 'error') {
                                count--;
                            }
                        });

                        return count;
                    };

                    self.onFilesChanged = function () {
                        if (options.maxFiles) {
                            self._handleMaxFiles();
                        }
                    };

                    self._handleMaxFiles = function () {
                        var maxFiles = self._getMaxFiles();

                        self.dropzone.options.maxFiles = maxFiles;
                        self.dropzone._updateMaxFilesReachedClass();

                        var $submitButton = self.find(options.clickableTrigger);

                        if (maxFiles <= 0) {
                            $submitButton.addClass('disabled').attr('disabled', 'disabled').css('pointer-events', 'none');
                        } else {
                            $submitButton.removeClass('disabled').removeAttr('disabled').css('pointer-events', 'auto');
                        }

                        if (
                            maxFiles != null &&
                            self.dropzone.getAcceptedFiles().length >= maxFiles &&
                            self.dropzone.getActiveFiles().length === 0
                        ) {
                            self.addClass('dz-max-files-uploaded');
                        } else {
                            self.removeClass('dz-max-files-uploaded');
                        }
                    };

                    self._getMaxFiles = function () {
                        return options.maxFiles - self.countUploadedFiles();
                    };

                    self._refreshUploadedPreviews = function () {
                        var fileUploadUploadedPreviews = self.data('file-upload-uploaded-previews');
                        if (!fileUploadUploadedPreviews) {
                            return;
                        }

                        $.get(fileUploadUploadedPreviews).done(function (response) {
                            self
                                .find(options.uploadedPreviewContainer)
                                .html($(response).find(options.uploadedPreviewContainer).unwrap().html());

                            self.onFilesChanged();
                        });
                    };

                    self._bindAjaxEvents = function () {
                        self
                            .find(options.uploadedPreviewContainer)
                            .on('ajax:send', options.uploadedPreviewItem, function (e) {
                                var $form = $(e.target);
                                if ($form.is(options.imageDeleteForm)) {
                                    $(this).hide();
                                }

                                self.onFilesChanged();
                            })
                            .on('ajax:error', options.uploadedPreviewItem, function (e) {
                                var $form = $(e.target);
                                if ($form.is(options.imageDeleteForm)) {
                                    $(this).show();
                                }

                                self.onFilesChanged();
                            })
                            .on('ajax:success', options.uploadedPreviewItem, function (e) {
                                var $form = $(e.target);
                                if ($form.is('[data-image-delete]')) {
                                    $(this).remove();
                                }

                                self.onFilesChanged();
                            })

                    };

                    self.init = function () {
                        var $form = self.find(options.form);
                        var $input = self.find(options.fileInput);

                        var config = {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            url: $form.attr('action'),
                            method: $form.attr('method'),
                            paramName: $input.attr('name'),
                            uploadMultiple: false,
                            previewsContainer: self.find(options.previewContainer).get(0),
                            clickable: self.find(options.clickableTrigger).get(0),
                            maxFiles: options.maxFiles,
                            acceptedFiles: options.fileTypes,
                            error: function error(file, payload) {
                                if (file.previewElement) {
                                    var $previewElement = $(file.previewElement);
                                    $previewElement.addClass('dz-error');

                                    var message = dot2val.get(payload, 'message', '');
                                    if (dot2val.get(payload, 'data.errors')) {
                                        message = [];
                                        $.each(dot2val.get(payload, 'data.errors'), function (k, v) {
                                            message.push(v);
                                        });
                                        message = message.join('<br>');
                                    }

                                    $previewElement.find('[data-dz-errormessage]').html(message);
                                }
                            }
                        };

                        if (self.find('[data-file-upload-preview-template]').length) {
                            config.previewTemplate = self.find('[data-file-upload-preview-template]').html();
                        }

                        self.dropzone = new Dropzone(self.get(0), config);

                        self.dropzone.on('success', function (file) {
                            self.dropzone.removeFile(file);
                            self._refreshUploadedPreviews();
                        });

                        self.dropzone.on('addedfile', self.onFilesChanged);
                        self.dropzone.on('removedfile', self.onFilesChanged);
                        self.dropzone.on('error', self.onFilesChanged);
                        self.dropzone.on('sending', self.onFilesChanged);
                        self.dropzone.on('success', self.onFilesChanged);
                        self.dropzone.on('canceled', self.onFilesChanged);
                        self.dropzone.on('processing', self.onFilesChanged);
                        self.dropzone.on('complete', self.onFilesChanged);
                        self.dropzone.on('queuecomplete', self.onFilesChanged);

                        self._bindAjaxEvents();
                        self.onFilesChanged();

                        self.addClass('dropzone--active');
                    };

                    self.init();
                }
            })(jQuery);

            Dropzone.autoDiscover = false;

            $(document).ready(function () {
                $('[data-file-upload]').each(function() {
                    var $upload = $(this);

                    var options = {
                        maxFiles: $upload.data('file-upload-max-files') || null,
                        maxFilesize: $upload.data('file-upload-max-size'),
                        form: '[data-file-upload-form]',
                        fileInput: '[data-file-upload-file]',
                        fileTypes: $upload.data('file-upload-types'),
                        imageDeleteForm: '[data-image-delete]',
                        previewContainer: '[data-file-upload-preview-container]',
                        uploadedPreviewContainer: '[data-file-upload-uploaded-preview-container]',
                        uploadedPreviewItem: '[data-file-upload-uploaded-preview-item]',
                        clickableTrigger: '[data-file-upload-clickable-trigger]',
                    };

                    $upload.fileUpload(options);
                });

                $('[data-image-delete]').each(function() {
                    var $form = $(this);

                    $form.on('submit', function(e) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        e.preventDefault();
                        var elem = $(this);

                        $.ajax({
                            url: elem.attr('action'),
                            type: 'POST',
                            data: $(elem[0]).serializeArray(),
                            beforeSend: function(xhr) {
                                elem.trigger('ajax:send', xhr);
                            },
                            complete: function(xhr, status) {
                                elem.trigger('ajax:complete', [xhr, status]);
                            },
                            error: function(xhr, status, error) {
                                elem.trigger('ajax:error', [xhr, status, error]);
                            },
                        });
                    });
                });
            });
        </script>
    @endsection
</x-master-layout>
