<div class="nav-tabs-custom" ng-repeat="(index, variation) in item.variations">

    <ul class="nav nav-tabs">

        <li
            ng-repeat="(k, tab) in variation.tabs"
            ng-hide="tab.hide( item )"
            class="{{ tabContentIsActive( tab.active ) ? 'active' : '' }}"
        ><a href="javascript:void(0)" ng-click="activeTab( $event, index, k )">{{ tab.title }}</a></li>

        <li
            class="pull-right"
            ng-hide="item.selectedType.disableVariation"
        >
            <span
                ng-show="item.variations.length > 1"
                title="<?php echo __( 'Supprimer une variation', 'nexo' );?>"
                class="btn btn-danger btn-md"
                ng-click="removeVariation( index )">
                    <i class="fa fa-remove"></i>
            </span>

            <span
                title="<?php echo __( 'Ajouter une variation', 'nexo' );?>"
                class="btn btn-info btn-md"
                ng-click="addVariation()">
                    <i class="fa fa-plus"></i>
            </span>
        </li>

    </ul>

    <div class="tab-content">

      <div
        ng-repeat="(k,tab) in variation.tabs"
        ng-init="variation.tabs[0].active   =   tabContentIsActive( variation.tabs[0].active, k )"
        style="display:block;">

        <div ng-show="tab.active"
        class="tab-pane row">



            <div
                ng-repeat="field in fields[ tab.namespace ]"
                class="{{ field.class !== undefined ? field.class : 'col-lg-6 col-sm-6 col-xs-12' }}"
                ng-show="field.show( variation, item, fields[ tab.namespace ] )"
            >

                <div class="form-group" ng-if="field.type == 'text'">
                    <div class="input-group">
                      <span class="input-group-addon">{{ field.label }}</span>
                      <input type="text" class="form-control" ng-model="variation[ field.model ]" placeholder="{{ field.placeholder }}">
                    </div>
                    <p class="help-block" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                </div>

                <div class="form-group" ng-if="field.type == 'select'">
                    <div class="input-group">
                        <span class="input-group-addon">{{ field.label }}</span>
                        <select class="form-control" ng-model="variation[ field.model ]">
                            <option ng-repeat="option in field.options" value="{{ option.value }}">{{ option.label }}</option>
                        </select>
                    </div>
                    <p class="help-block" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                </div>

                <div class="form-group" ng-if="field.type == 'datetimepicker'">
                    <div class="dropdown">
                        <a class="dropdown-toggle" id="dropdown" role="button" data-toggle="dropdown" data-target="#" href="#">
                            <div class="input-group">
                                <span class="input-group-addon">{{ field.label }}</span>
                                <input type="text" id="date" name="date" class="form-control"  ng-model="variation[ field.model ]">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <datetimepicker
                                data-before-render="field.beforeRender( $dates, $view, $leftDate, $upDate, $rightDate, variation )"
                                data-ng-model="variation[ field.model ]"
                                data-on-set-time="field.onSet( $broadcast )"
                                data-datetimepicker-config="{ dropdownSelector: '#dropdown' }">
                            </datetimepicker>
                        </ul>
                    </div>
                    <p class="help-block" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                </div>

                <div
                    class="row"
                    ng-if="field.type == 'group'"
                    ng-init="variation[ field.model ] = resetGroup( variation[ field.model ] )"
                >

                    <div
                        class="col-lg-6 col-sm-6 col-xs-12"
                        ng-repeat="(group_index,group_value) in variation[ field.model ]"
                    >

                        <div class="box box-primary" style="background:#F1F1F1;" >
                            <div class="box-header with-border">
                                <!-- .groups" -->
                                <div class="box-title">
                                    {{ field.label }}
                                </div>
                                <div class="box-tools pull-right">
                                    <button ng-show="variation[ field.model ].length <= groupLengthLimit" type="button" name="button" class="btn btn-sm btn-primary" ng-click="addGroup( variation[ field.model ] )"><i class="fa fa-plus" ></i></button>
                                    <button ng-show="variation[ field.model ].length > 1" type="button" ng-click="removeGroup( group_index, variation[ field.model ] )" name="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div
                                    ng-repeat="subField in field.subFields"
                                    ng-show="subField.show( variation, item, field.subFields )"
                                >

                                    <div class="form-group" ng-if="subField.type == 'text'">

                                        <div class="input-group">

                                          <span class="input-group-addon">{{ subField.label }}</span>

                                          <input
                                            type="text"
                                            class="form-control"
                                            ng-model="variation[ field.model ][ group_index ][ subField.model ]"
                                            placeholder="{{ subField.placeholder }}"
                                            >

                                        </div>
                                        <p class="help-block" style="height:30px;font-size:12px;">{{ subField.desc }}</p>
                                    </div>

                                    <div class="form-group" ng-if="subField.type == 'select'">
                                        <div class="input-group">
                                            <span class="input-group-addon">{{ subField.label }}</span>
                                            <select class="form-control" ng-model="variation[ field.model ][ group_index ][ subField.model ]">
                                                <option ng-repeat="option in subField.options" value="{{ option.value }}">{{ option.label }}</option>
                                            </select>
                                        </div>
                                        <p class="help-block" style="height:30px;font-size:12px;">{{ subField.desc }}</p>
                                    </div>

                                    <!--  Image Select -->

                                    <div class="input-group" ng-if="subField.type == 'image_select'">
                                      <span class="input-group-addon">{{ subField.label }}</span>
                                      <input ng-model="variation[ field.model ][ group_index ][ subField.model ]" type="text" class="form-control" placeholder="">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="input-group" ng-if="field.type == 'image_select'">
                  <span class="input-group-addon">{{ field.label }}</span>
                  <input ng-model="variation[ field.model ]" type="text" class="form-control" placeholder="">

                </div>
            </div>
        </div>

      </div>
    </div>
    <!-- /.tab-content -->
</div>
