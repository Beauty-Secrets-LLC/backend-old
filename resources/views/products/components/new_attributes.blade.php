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
        <div class="d-flex flex-column flex-md-row gap-5">
            <div class="flex-row-fluid">
                @if (!empty($attributes))
                    <select  name="attributes" class="form-select" data-control="select2" data-placeholder="Сонгох">
                        <option value="" selected disabled>Сонгох</option>
                        @foreach ($attributes as $attribute)
                            <option value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
                        @endforeach
                        <option value="custom">Дурын шинж</option>
                    </select>
                @endif
            </div>
            <div class="flex-row-fluid">
                <button type="button" class="btn btn-primary">Нэмэх</button>
            </div>
        </div>

        <div>
            @livewire('product.add-attributes')
        </div>

        
    </div>
    <!--end::Card header-->
</div>