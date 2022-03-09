<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Шинж чанар</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->

        <div>
            @if (!empty($product['product_attributes']))
                @dump($product['product_attributes'])
                @php
                    $attribute_array = [];
                    $attribute_registrar = [];
                    $attribute_counter = 0;
                    foreach($product['product_attributes'] as $attribute) {
                        // if(!is_null($attribute['attribute_id'])) {

                        //     if(in_)
                        //     $attribute_registrar[] = $attribute['attribute_id'];
                        //     $attribute_array[$attribute_counter]['id'] = $attribute['attribute_id'];
                        //     $attribute_array[$attribute_counter]['name'] = $attribute['attribute_name'];
                        //     $attribute_array[$attribute_counter]['selected'][] = $attribute['attribute_value'];
                        // }
                        // if(!is_null($attribute['attribute_id'])) {
                        //     //custom attr
                        //     $attribute_array[$attribute['attribute_id']][$attribute['attribute_value_id']] = $attribute['attribute_value'];
                        // }else {
                        //     //registered attr
                        //     $attribute_array[$attribute['attribute_name']] = $attribute['attribute_value'];
                        // }     
                    }
                    dump($attribute_array);
                @endphp
            @endif
        </div>
        
        <div>
            @livewire('product.add-attributes', ['product' => $product])
        </div>
        
    </div>
    <!--end::Card header-->
</div>