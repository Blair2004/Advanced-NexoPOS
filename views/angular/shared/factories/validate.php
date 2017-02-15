tendooApp.factory( 'validate', function(){
    return new function(){
        var expression  =   {
            required: function(value) {
              return !!value;
            },
            url: /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/,
            email: /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/,
            number: /^\d+$/,
            alpha_char  :    /^[a-zA-Z]+$/,
            alpha_num   :   /^[a-zA-Z0-9]+$/,
            ip          :   /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?).){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/,
            digit       :   /^[0-9]+$/,
            decimal       :   /^[+-]?\d+(\.\d+)?$/
        };
        var $this       =   this;
        /**
         *  Individual Validation
         *  @param object field
         *  @param object item
         *  @return object error
        **/

        this.__run          =   function( field, item ) {
            var errors      =   {};
            if( angular.isDefined( field.validation ) ) {
                _.each( field.validation, function( value, rule ) {
                    if( rule == 'required' && value == true ) {
                        if( ! angular.isDefined( item[ field.model ] ) ) {
                            errors[ field.model ]           =   {};
                            errors[ field.model ].msg       =   '<?php echo _s( 'This field is required', 'nexopos_advanced' );?>';
                            errors[ field.model ].label     =   field.label;
                        }
                    }

                    if( rule == 'email' && value == true && typeof item[ field.model ] != 'undefined' ) {
                        if( ! item[ field.model ].match( expression.email ) ) {
                            errors[ field.model ]           =   {};
                            errors[ field.model ].msg       =   '<?php echo _s( 'The value %% is not a valid email', 'nexopos_advanced' );?>';
                            errors[ field.model ].label     =   field.label;
                        }
                    }

                    if( rule == 'min_value' && typeof item[ field.model ] != 'undefined' ) {
                        if( item[ field.model ].length < value ) {
                            errors[ field.model ]           =   {};
                            errors[ field.model ].msg       =   '<?php echo _s( 'The field length shouldn\'t be lower than {0}', 'nexopos_advanced' );?>' . format( value );
                            errors[ field.model ].label     =   field.label;
                        }
                    }

                    if( rule == 'max_value' && typeof item[ field.model ] != 'undefined' ) {
                        if( item[ field.model ].length > value ) {
                            errors[ field.model ]           =   {};
                            errors[ field.model ].msg       =   '<?php echo _s( 'The field length shouldn\'t be greather than {0}', 'nexopos_advanced' );?>' . format( value );
                            errors[ field.model ].label     =   field.label;
                        }
                    }

                    if( rule == 'numeric' && value == true && typeof item[ field.model ] != 'undefined' ) {
                        if( ! item[ field.model ].match( expression.number ) ) {
                            errors[ field.model ]           =   {};
                            errors[ field.model ].msg       =   '<?php echo _s( 'This field should be a numeric value', 'nexopos_advanced' );?>';
                            errors[ field.model ].label     =   field.label;
                        }
                    }

                    if( rule == 'decimal' && value == true && typeof item[ field.model ] != 'undefined' ) {
                        if( ! item[ field.model ].match( expression.decimal ) ) {
                            errors[ field.model ]           =   {};
                            errors[ field.model ].msg       =   '<?php echo _s( 'This field should be a decimal/numeric value', 'nexopos_advanced' );?>';
                            errors[ field.model ].label     =   field.label;
                        }
                    }
                });
            }
            else {
                item[ field.model ]     =   angular.isUndefined( item[ field.model ]  ) ? '' : item[ field.model ];
            }
            return errors;
        }

        this.run        =   function( fields, item ) {
            var errors          =   {};
            _.each( fields, function( field ){
                // extends current field errors
                errors          =   _.extend( errors, $this.__run( field, item ) );
            });

            // replace template on error if exists
            errors              =   this.__replaceTemplate( errors );

            return this.__response( errors );
        };

        /**
         *  Turn into response
         *  @param object error
         *  @return object
        **/

        this.__response     =   function( errors ) {
            return {
                isValid     :   angular.equals({}, errors ) ? true : false,
                errors      :   errors
            }
        }

        this.focus      =   function( field, item ) {
            var fieldClass      =   '.' + field.model;
            angular.element( fieldClass ).closest( '.form-group' ).removeClass( 'has-error' );
            angular.element( fieldClass ).text( field.desc );
        }

        /**
         *  unique validation
         *  @param object fields
         *  @param object item
         *  @return void
        **/

        this.blur       =   function( field, item ) {
            var validation      =   this.__run( field, item );
            var response        =   this.__response( validation );
            var errors          =   this.__replaceTemplate( response.errors );
            var fieldClass      =   '.' + field.model;
            if( ! response.isValid ) {
                angular.element( fieldClass ).closest( '.form-group' ).removeClass( 'has-success' );
                angular.element( fieldClass ).text( errors[ field.model ].msg );
                angular.element( fieldClass ).closest( '.form-group' ).addClass( 'has-error' );
            }
        }

        /**
         *  Blur all fields to display errors
         *  @param object fields
         *  @return void
        **/

        this.blurAll            =   function( fields, item ) {
            _.each( fields, function( field ) {
                $this.blur( field, item );
            });
        }

        /**
         *  Replace template
         *  @param  object validation object
         *  @return object
        **/

        this.__replaceTemplate    =   function( errors ) {
            _.each( errors, function( value, key ) {
                errors[ key ].msg   =   value.msg.replace( '%%', value.label );
            });
            return errors;
        }
    }
})
