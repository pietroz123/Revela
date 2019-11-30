@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('styles')
    <link href="{{ asset('lib/fileuploader/dist/font/font-fileuploader.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/fileuploader/dist/jquery.fileuploader.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/fileuploader/dist/jquery.fileuploader-theme-gallery.css') }}" rel="stylesheet">
@endsection

@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h2>Álbum do Mês (<span class="text-capitalize">{{ \Carbon\Carbon::now()->formatLocalized("%B") }}</span> de {{ \Carbon\Carbon::now()->year }})</h2>   

    <form method="POST" action="{{ route('albums.store') }}">
        @csrf

        <h5 class="mt-5 mb-3">Selecionar Template</h5>
        
        <div class="templates">
        
            <div class="template">
                <div class="template-description">
                    <span>Halloween</span>
                </div>
                <div class="template-image">
                    <img src="{{ asset('img/templates/halloween.png') }}" alt="Template de Halloween">
                </div>
            </div>
        
            <div class="template">
                <div class="template-description">
                        <span>Férias com amigos</span>
                    </div>
                    <div class="template-image">
                        <img src="{{ asset('img/templates/ferias-amigos.jpg') }}" alt="Template de Férias com amigos">
                </div>
            </div>
        
            <div class="template">
                <div class="template-description">
                        <span>Férias com família</span>
                    </div>
                    <div class="template-image">
                        <img src="{{ asset('img/templates/ferias-familia.jpg') }}" alt="Template de Férias com família">
                </div>
            </div>
        
            <div class="template">
                <div class="template-description">
                        <span>Clássico</span>
                    </div>
                    <div class="template-image">
                        <img src="{{ asset('img/templates/classico.png') }}" alt="Template de Clássico">
                </div>
            </div>
        
            <div class="template">
                <div class="template-description">
                        <span>Dia-a-Dia</span>
                    </div>
                    <div class="template-image">
                        <img src="{{ asset('img/templates/dia-a-dia.jpg') }}" alt="Template de Dia-a-Dia">
                </div>
            </div>
        
        </div>
        
        
        <h5 class="mt-5 mb-4">Configurações do Álbum</h5>
        
        <div class="form-group row">
            <div class="col-5">
                <label for="album-name">Nome do Álbum</label>
                <input class="form-control" name="album-name" id="album-name" type="text" placeholder="Nome do álbum">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-5">
                <label for="album-description">Descrição Especial (Opcional)</label>
                <textarea class="form-control" id="album-description" name="album-description" rows="3" placeholder="Descrição"></textarea>
            </div>   
        </div>
        
        <h5 class="mt-5 mb-4">Importar Fotos</h5>
        <h6>
            <span class="n-photos-selected">
                {{ count($files) }}
            </span>
            /
            <span class="n-photos-max">{{ Auth::user()->subscription->plan->number_of_photos }}</span> 
            fotos selecionadas
        </h6>
        
        <div class="form-group">
            <input type="file" name="files" id="album-photos-input" data-upload-url="{{ route('photos.upload') }}" data-upload-token="{{ csrf_token() }}" data-album-month="{{ date('n') }}">
        </div>
        
        <button class="btn btn-info" type="submit" id="btn-solicitar">Solicitar Álbum</button>
    </form>

@endsection

@section('scripts')
    <script src="{{ asset('lib/fileuploader/dist/jquery.fileuploader.min.js') }}"></script>
    <script>
        /**
         * FileUploader
         */
        var $fileuploader = $('input[name="files"]').fileuploader({
            limit: 100,
            files: @json($files),
            fileMaxSize: 20,
            extensions: ['image/*'],
            changeInput: ' ',
            theme: 'gallery',
            enableApi: true,
            thumbnails: {
                box: '<div class="fileuploader-items">' +
                        '<ul class="fileuploader-items-list">' +
                            '<li class="fileuploader-input"><button type="button" class="fileuploader-input-inner"><i class="fileuploader-icon-main"></i> <span>${captions.feedback}</span></button></li>' +
                        '</ul>' +
                    '</div>',
                item: '<li class="fileuploader-item">' +
                        '<div class="fileuploader-item-inner">' +
                            '<div class="actions-holder">' +
                                '<button type="button" class="fileuploader-action fileuploader-action-settings is-hidden" title="${captions.edit}"><i class="fileuploader-icon-settings"></i></button>' +
                                '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                '<div class="gallery-item-dropdown">' +
                                    '<a class="gallery-action-rename">${captions.setting_rename}</a>' +
                                    '<a class="gallery-action-asmain">${captions.setting_asMain}</a>' +
                                '</div>' +
                            '</div>' +
                            '<div class="thumbnail-holder">' +
                                '${image}' +
                                '<span class="fileuploader-action-popup"></span>' +
                                '<div class="progress-holder"><span></span>${progressBar}</div>' +
                            '</div>' +
                            '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                            '<div class="type-holder">${icon}</div>' +
                        '</div>' +
                    '</li>',
                item2: '<li class="fileuploader-item file-main-${data.isMain}">' +
                        '<div class="fileuploader-item-inner">' +
                            '<div class="actions-holder">' +
                                '<button type="button" class="fileuploader-action fileuploader-action-settings" title="${captions.edit}"><i class="fileuploader-icon-settings"></i></button>' +
                                '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                '<div class="gallery-item-dropdown">' +
                                    '<a href="${data.url}" target="_blank">${captions.setting_open}</a>' +
                                    '<a href="${data.url}" download>${captions.setting_download}</a>' +
                                    '<a class="fileuploader-action-popup">${captions.setting_edit}</a>' +
                                    '<a class="gallery-action-rename">${captions.setting_rename}</a>' +
                                    '<a class="gallery-action-asmain">${captions.setting_asMain}</a>' +
                                '</div>' +
                            '</div>' +
                            '<div class="thumbnail-holder">' +
                                '${image}' +
                                '<span class="fileuploader-action-popup"></span>' +
                            '</div>' +
                            '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                            '<div class="type-holder">${icon}</div>' +
                        '</div>' +
                    '</li>',
                itemPrepend: true,
                startImageRenderer: true,
                canvasImage: false,
                onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                    var api = $.fileuploader.getInstance(inputEl),
                        color = api.assets.textToColor(item.format),
                        $plusInput = listEl.find('.fileuploader-input'),
                        $progressBar = item.html.find('.progress-holder');

                    // put input first in the list
                    $plusInput.prependTo(listEl);

                    // color the icon and the progressbar with the format color
                    item.html.find('.type-holder .fileuploader-item-icon')[api.assets.isBrightColor(color) ? 'addClass' : 'removeClass']('is-bright-color').css('backgroundColor', color);
                    $progressBar.css('backgroundColor', color);
                },
                onImageLoaded: function(item, listEl, parentEl, newInputEl, inputEl) {
                    var api = $.fileuploader.getInstance(inputEl);
                    
                    // add icon
                    item.image.find('.fileuploader-item-icon i').html('')
                        .addClass('fileuploader-icon-' + (['image', 'video', 'audio'].indexOf(item.format) > -1 ? item.format : 'file'));

                    // check the image size
                    if (item.format == 'image' && item.upload && !item.imU) {
                        if (item.reader.node && (item.reader.width < 100 || item.reader.height < 100)) {
                            alert(api.assets.textParse(api.getOptions().captions.imageSizeError, item));
                            return item.remove();
                        }

                        item.image.hide();
                        item.reader.done = true;
                        item.upload.send();
                    }

                },
                onItemRemove: function(html) {
                    html.fadeOut(250);	
                }
            },
            dragDrop: {
                container: '.fileuploader-theme-gallery .fileuploader-input'
            },
            upload: {
                url: '/albums/ajax_upload_file',
                data: {
                    album_month: $('#album-photos-input').attr('data-album-month'),
                },
                type: 'POST',
                enctype: 'multipart/form-data',
                start: true,
                synchron: true,
                beforeSend: function(item, listEl, parentEl, newInputEl, inputEl) {

                    /**
                     * Get API instance
                     */
                    const api = $.fileuploader.getInstance(inputEl);

                    /**
                     * Check if number of photos has exceeded max 
                     */
                    var nPhotosSelected = Number($('.n-photos-selected').text());
                    const nPhotosMax = Number($('.n-photos-max').text());

                    if (nPhotosSelected == nPhotosMax) {
                        alert('O número máximo de fotos do seu plano foi atingido.');
                        return false;
                    }

                    // check the image size first (onImageLoaded)
                    if (item.format == 'image' && !item.reader.done)
                        return false;

                    // add editor to upload data after editing
                    if (item.editor && (typeof item.editor.rotation != "undefined" || item.editor.crop)) {
                        item.imU = true;
                        item.upload.data.name = item.name;
                        item.upload.data.id = item.data.listProps.id;
                        item.upload.data._editorr = JSON.stringify(item.editor);
                    }

                    item.html.find('.fileuploader-action-success').removeClass('fileuploader-action-success');

                    item.upload.url = inputEl.attr('data-upload-url');
                    item.upload.data._token = inputEl.attr('data-upload-token');
                    console.log(item);
                    
                },
                onSuccess: function(result, item, listEl, parentEl, newInputEl, inputEl) {

                    console.log(result);
                    

                    var data = {};

                    try {
                        data = JSON.parse(result);
                    } catch (e) {
                        data.hasWarnings = true;
                    }

                    console.log(data);
                    

                    // if success update the information
                    if (data.isSuccess && data.files.length) {
                        if (!item.data.listProps)
                            item.data.listProps = {};
                        item.title = data.files[0].title;
                        item.name = data.files[0].name;
                        item.size = data.files[0].size;
                        item.size2 = data.files[0].size2;
                        item.data.url = data.files[0].url;
                        item.data.listProps.id = data.files[0].id;

                        item.html.find('.content-holder h5').attr('title', item.name).text(item.name);
                        item.html.find('.content-holder span').text(item.size2);
                        item.html.find('.gallery-item-dropdown [download]').attr('href', item.data.url);
                    }

                    // if warnings
                    if (data.hasWarnings) {
                        for (var warning in data.warnings) {
                            alert(data.warnings[warning]);
                        }

                        item.html.removeClass('upload-successful').addClass('upload-failed');
                        return this.onError ? this.onError(item) : null;
                    }

                    delete item.imU;
                    item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');

                    setTimeout(function() {
                        item.html.find('.progress-holder').hide();

                        item.html.find('.fileuploader-action-popup, .fileuploader-item-image').show();
                        item.html.find('.fileuploader-action-sort').removeClass('is-hidden');
                        item.html.find('.fileuploader-action-settings').removeClass('is-hidden');
                    }, 400);

                    /**
                     * Get API instance
                     */
                    const api = $.fileuploader.getInstance(inputEl);
                    var nPhotosSelected = Number($('.n-photos-selected').text());

                    // Update number of photos selected
                    $('.n-photos-selected').text(nPhotosSelected + 1);

                    /**
                     * Check if number of photos has exceeded max 
                     */
                    nPhotosSelected = Number($('.n-photos-selected').text());
                    const nPhotosMax = Number($('.n-photos-max').text());

                    if (nPhotosSelected == nPhotosMax) {
                        api.disable();
                    }

                },
                onError: function(item, listEl, parentEl, newInputEl, inputEl, jqXHR, textStatus, errorThrown) {

                    item.html.find('.progress-holder, .fileuploader-action-popup, .fileuploader-item-image').hide();

                    // add retry button
                    item.upload.status != 'cancelled' && !item.imU && !item.html.find('.fileuploader-action-retry').length ? item.html.find('.actions-holder').prepend(
                        '<button type="button" class="fileuploader-action fileuploader-action-retry" title="Retry"><i class="fileuploader-icon-retry"></i></button>'
                    ) : null;
                },
                onProgress: function(data, item) {
                    var $progressBar = item.html.find('.progress-holder');

                    if ($progressBar.length) {
                        $progressBar.show();
                        $progressBar.find('span').text(data.percentage >= 99 ? 'Uploading...' : data.percentage + '%');
                        $progressBar.find('.fileuploader-progressbar .bar').height(data.percentage + '%');
                    }

                    item.html.find('.fileuploader-action-popup, .fileuploader-item-image').hide();
                }
            },
            afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                var api = $.fileuploader.getInstance(inputEl),
                    $plusInput = listEl.find('.fileuploader-input');

                // bind input click
                $plusInput.on('click', function() {
                    api.open();
                });

                // bind dropdown buttons
                $('body').on('click', function(e) {
                    var $target = $(e.target),
                        $item = $target.closest('.fileuploader-item'),
                        item = api.findFile($item);

                    // toggle dropdown
                    $('.gallery-item-dropdown').hide();
                    if ($target.is('.fileuploader-action-settings') || $target.parent().is('.fileuploader-action-settings')) {
                        $item.find('.gallery-item-dropdown').show(150);
                    }

                    // rename
                    if ($target.is('.gallery-action-rename')) {
                        var x = prompt(api.getOptions().captions.rename, item.title);

                        if (x && item.data.listProps) {
                            $.ajax({
                                url: '/albums/ajax_rename_file',
                                method: 'POST',
                                data: {
                                    _token: inputEl.attr('data-upload-token'),
                                    album_month: $('#album-photos-input').attr('data-album-month'),
                                    name: item.name, 
                                    title: x
                                },
                                success: function(result) {
                                    console.log('Success');
                                    console.log(result);

                                    try {
                                        var j = JSON.parse(result);

                                        // update the file name and url
                                        if (j.title) {
                                            item.title = j.title;
                                            item.name = item.title + (item.extension.length ? '.' + item.extension : '');
                                            $item.find('.content-holder h5').attr('title', item.name).html(item.name);
                                            $item.find('.gallery-item-dropdown [download]').attr('href', item.data.url);

                                            if (item.popup.html)
                                                item.popup.html.find('h5:eq(0)').text(item.name);

                                            if (j.url)
                                                item.data.url = j.url;
                                            if (item.appended && j.file)
                                                item.file = j.file;

                                            api.updateFileList();
                                        }

                                    } catch(e) {
                                        alert(api.getOptions().captions.renameError);
                                    }
                                },
                                error: function(result) {
                                    console.log('Error');
                                    console.log(result);
                                }
                            });
                        }
                    }

                    // set main
                    if ($target.is('.gallery-action-asmain') && item.data.listProps) {
                        $.ajax({
                            url: '/albums/ajax_main_file',
                            method: 'POST',
                            data: {
                                album_month: $('#album-photos-input').attr('data-album-month'),
                                _token: inputEl.attr('data-upload-token'),
                                name: item.name, 
                                id: item.data.listProps.id,
                            },
                            success: function(retorno) {
                                console.log('Success');
                                console.log(retorno);

                                api.getFiles().forEach(function(val) {
                                    delete val.data.isMain;
                                    val.html.removeClass('file-main-0 file-main-1');
                                });
                                item.html.addClass('file-main-1');
                                item.data.isMain = true;

                                api.updateFileList();
                            },
                            error: function(retorno) {
                                console.log('Error');
                                console.log(retorno);
                            }
                        });
                    }
                });
            },
            onRemove: function(item, listEl, parentEl, newInputEl, inputEl) {
                $.ajax({
                    url: '/albums/ajax_remove_file',
                    method: 'POST',
                    data: {
                        album_month: $('#album-photos-input').attr('data-album-month'),
                        _token: inputEl.attr('data-upload-token'),
                        file: item.name,
                    },
                    success: function(retorno) {
                        console.log('Success');
                        console.log(retorno);

                        /**
                         * Get API instance
                         */
                        const api = $.fileuploader.getInstance(inputEl);
                        var nPhotosSelected = Number($('.n-photos-selected').text());

                        // Update number of photos selected
                        $('.n-photos-selected').text(nPhotosSelected - 1);

                        /**
                         * Check if number of photos has exceeded max 
                         */
                        nPhotosSelected = Number($('.n-photos-selected').text());
                        const nPhotosMax = Number($('.n-photos-max').text());

                        if (nPhotosSelected < nPhotosMax) {
                            api.enable();
                        }

                    },
                    error: function(retorno) {
                        console.log('Error');
                        console.log(retorno);
                    }
                });
            },
            captions: {
                feedback: 'Drag & Drop',
                setting_asMain: 'Usar como principal',
                setting_download: 'Baixar',
                setting_edit: 'Editar',
                setting_open: 'Abrir',
                setting_rename: 'Renomear',
                rename: 'Entre com o novo nome:',
                renameError: 'Por favor digite outro nome.',
                imageSizeError: 'A imagem ${name} é muito pequena.',
            }
        });

    </script>
@endsection