tendooApp.factory( 'factoryTable', function(){
    return new function(){
        this.columns    =   [];

        /**
         *  Order Columns
         *  @param object column
         *  @return void
        **/

        this.order      =   function( col, table ) {

            // Reset table columns
            _.each( table.columns, function( value ) {
                if( col.namespace != value.namespace ) {
                    value.order     =   void(0);
                }
            });

            // Set table order
            if( angular.isUndefined( col.order ) ) {
                col.order   =   'desc';
            } else if( col.order == 'desc' ) {
                col.order   =   'asc';
            } else  if( col.order == 'asc' ) {
                col.order   =   void(0);
            }

            if( typeof table.get == 'function' ) {
                // Trigger callback
                table.get({
                    order   :   col.order,
                    column  :   col.namespace
                });
            }
        }

    }
})
