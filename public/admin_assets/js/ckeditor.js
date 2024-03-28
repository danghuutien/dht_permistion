function initEditor(editor){
    ClassicEditor.create(editor, {
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
            ],
            supportAllValues: true
        },
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
                    'outdent',
                    'indent',
                    '|',
                    'insertImage',
                    'htmlEmbed',
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
        alignment: {
            options: ['left', 'right', 'center', 'justify']
        },
        language: {
            ui: window.siteEditorLocale || 'en',
            content: window.siteEditorLocale || 'en',
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        codeBlock: {
            languages: [
                {language: 'plaintext', label: 'Plain text'},
                {language: 'c', label: 'C'},
                {language: 'cs', label: 'C#'},
                {language: 'cpp', label: 'C++'},
                {language: 'css', label: 'CSS'},
                {language: 'diff', label: 'Diff'},
                {language: 'html', label: 'HTML'},
                {language: 'java', label: 'Java'},
                {language: 'javascript', label: 'JavaScript'},
                {language: 'php', label: 'PHP'},
                {language: 'python', label: 'Python'},
                {language: 'ruby', label: 'Ruby'},
                {language: 'typescript', label: 'TypeScript'},
                {language: 'xml', label: 'XML'},
                {language: 'dart', label: 'Dart', class: 'language-dart'},
            ]
        },
        heading: {
            options: [
                {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
            ]
        },
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
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
        htmlEmbed: {
            showPreviews: true
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
        
    });
}
