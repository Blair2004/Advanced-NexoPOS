<div class="col-md-12">
    <h3 style="margin-top:0px;">{{ crud.listTitle }}<a ng-href="{{ crud.addNewLink }}" class="btn btn-primary btn-sm pull-right">{{ crud.addNew }}</a></h3>
    <div class="box">
        <div class="box-header">
            <span class="box-title">{{ crud.listTitle }}</span>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- Expect col to be an object with following keys : text, namespace, order (for reorder) -->
                    <td ng-repeat="col in table.columns" ng-click="table.order( col, table )">
                        {{ col.text }}
                        <span ng-show="! col.order" class="fa fa-arrows-v pull-right"></span>
                        <span ng-show="col.order == 'asc'" class="fa fa-arrow-up pull-right"></span>
                        <span ng-show="col.order == 'desc'" class="fa fa-arrow-down pull-right"></span>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="entry in table.entries">
                    <td ng-repeat="col in table.columns">{{ entry[ col.namespace ] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
