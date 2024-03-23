
ClassicEditor
    .create(editor, {
        fontSize: {
            options: [
                9,
                11,
                13,
                'default',
                17,
                16,
                18,
                19,
                21,
                22,
                23,
                24,
                25,
                26,
                27,
                28,
                29,
                30,
                32,
                34,
                36,
                38,
                40
            ]
        },
        alignment: {
            options: ['left', 'right', 'center', 'justify']
        },
        shortcode: {
            onEdit: (shortcode, name = () => {
            }) => {
                let description = null;
                if (this.shortcodes.length) {
                    this.shortcodes.forEach(function (item) {
                        if (item.key === name) {
                            description = item.description;
                            return true;
                        }
                    });
                }
                this.shortcodeCallback({
                    key: name,
                    href: `/admin/short-codes/ajax-get-admin-config/${name}`,
                    data: {
                        code: shortcode,
                    },
                    description: description,
                    previewImage: '',
                    update: true
                })
            },
            onCallback: (shortcode, options) => {
                this.shortcodeCallback({
                    key: shortcode,
                    href: options.url,
                    previewImage: ''
                });
            }
        },

        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        placeholder: ' ',
        toolbar: {
            items: [
                'heading',
                '|',
                'fontColor',
                'fontSize',
                'fontBackgroundColor',
                'fontFamily',
                'bold',
                'italic',
                'underline',
                'link',
                'strikethrough',
                'bulletedList',
                'numberedList',
                '|',
                'alignment',
                'direction',
                'shortcode',
                'outdent',
                'indent',
                '|',
                'htmlEmbed',
                'imageInsert',
                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo',
                'findAndReplace',
                'removeFormat',
                'sourceEditing',
                'codeBlock',
            ]
        },
        language: {
            ui: window.siteEditorLocale || 'en',
            content: window.siteEditorLocale || 'en',
        },
        image: {
            toolbar: [
                "toggleImageCaption",
                "imageTextAlternative",
                "imageStyle:inline",
                "imageStyle:block",
                "imageStyle:side",
                "imageStyle:alignLeft",
                "imageStyle:alignRight",
                "imageStyle:alignBlockLeft",
                "imageStyle:alignBlockRight",
                "imageStyle:alignCenter",
                'ImageResize',
            ],
            upload: {
                types: ['jpeg', 'png', 'gif', 'bmp', 'webp', 'tiff', 'svg+xml']
            }
        },
        codeBlock: {
            languages: [
                { language: 'plaintext', label: 'Plain text' },
                { language: 'c', label: 'C' },
                { language: 'cs', label: 'C#' },
                { language: 'cpp', label: 'C++' },
                { language: 'css', label: 'CSS' },
                { language: 'diff', label: 'Diff' },
                { language: 'html', label: 'HTML' },
                { language: 'java', label: 'Java' },
                { language: 'javascript', label: 'JavaScript' },
                { language: 'php', label: 'PHP' },
                { language: 'python', label: 'Python' },
                { language: 'ruby', label: 'Ruby' },
                { language: 'typescript', label: 'TypeScript' },
                { language: 'xml', label: 'XML' },
                { language: 'dart', label: 'Dart', class: 'language-dart' },
            ]
        },
        link: {
            defaultProtocol: 'http://',
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                    }
                },
                noFollow: {
                    mode: "manual",
                    label: "Nofollow",
                    attributes: {
                        rel: "nofollow",
                    },
                },
            }
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells',
                'tableCellProperties',
                'tableProperties'
            ]
        },
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
    })
    .then(editor => {
        editor.plugins.get('FileRepository').createUploadAdapter = loader => {
            return new CKEditorUploadAdapter(loader, '/admin/media/upload-from-editor', editor.t);
        };
        editor.model.document.on("change:data", () => {
            const editorData = editor.getData();
            localStorage.setItem(`${window.location.href}__${element}`, editorData)
        });
        // create function insert html
        editor.insertHtml = html => {
            const viewFragment = editor.data.processor.toView(html);
            const modelFragment = editor.data.toModel(viewFragment);
            editor.model.insertContent(modelFragment);
        }
        editorCustom[element] = editor
        window.editorCustom = editorCustom
        window.editor = editorCustom;

        this.CKEDITOR[element] = editor;

        const minHeight = $('#' + element).prop('rows') * 90;
        const className = `ckeditor-${element}-inline`;
        $(editor.ui.view.editable.element)
            .addClass(className)
            .after(`
                    <style>
                        .ck-editor__editable_inline {
                            min-height: ${minHeight - 100}px;
                            max-height: ${minHeight + 100}px;
                        }
                    </style>
                `);

        // debounce content for ajax ne
        let timeout;
        editor.model.document.on('change:data', () => {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                editor.updateSourceElement();
            }, 150)
        });

        // insert media embed
        editor.commands._commands.get('mediaEmbed').execute = url => {
            editor.insertHtml(`[media url="${url}"][/media]`);
        }

    })
    .catch(error => {
        console.error(error);
    });