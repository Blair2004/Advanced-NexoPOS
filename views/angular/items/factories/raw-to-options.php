tendooApp.factory( 'rawToOptions', function(){

    /**
     *  Turn Raw Options to dropdown option
     *  @param object
     *  @param string key
     *  @param string value
     *  @return object
    **/

    return function( raw, value, label ) {
        var DropdownOptions         =   [];

        _.each( raw, function( value ) {
            DropdownOptions.push({
                value       :   value[value],
                label       :   value[label]
            })
        });

        return DropdownOptions;
    }
});
