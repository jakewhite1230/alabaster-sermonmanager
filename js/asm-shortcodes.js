/*global tinyMCE, tinymce*/
/*jshint forin:true, noarg:true, noempty:true, eqeqeq:true, bitwise:true, strict:true, undef:true, unused:true, curly:true, browser:true, devel:true, maxerr:50 */
(function() {
"use strict";

    tinymce.init({
        selector: ".wp-editor-area",
        toolbar: "shortcodes",
        setup: function(editor) {

            tinymce.PluginManager.add( 'asm_button_location', function( editor, url ) {

                editor.addButton( 'shortcodes', {
                    type: 'listbox',
                    text: 'Sermon Shortcodes',
                    icon: false,
                    onselect: function(e) {
                    },
                    values: [

                        {text: 'List By Speaker', onclick : function() {
                            tinymce.execCommand('mceInsertContent', false, '[alabaster_sermonmanager_speaker]');
                        }},
                        {text: 'List By Series', onclick : function() {
                            tinymce.execCommand('mceInsertContent', false, '[alabaster_sermonmanager_series]');
                        }},
                        {text: 'List Sermons', onclick : function() {
                            tinymce.execCommand('mceInsertContent', false, '[alabaster_sermonmanager_sermons]');
                        }},

                    ]

                });

          });

        }

    });

})();
