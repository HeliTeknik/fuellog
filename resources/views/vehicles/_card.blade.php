<div class="overflow-hidden bg-white border rounded mb3 card">
    <div class="white card-cover" style="background-color: #{{ $vehicle->color }};">
        <h2 class="h2 m0 regular">
            {!! link_to_route('vehicles.show', $vehicle->name, [$vehicle->id], ['class' => 'white']) !!}
        </h2>
    </div>
    <div class="p2">
        <div class="flex mxn2 px2">
            <div class="flex-auto col-6">
                <span><b>Driven KM:</b> {{ $vehicle->getSumDrivenUnits() }} km</span>
            </div>
            <div class="flex-auto col-6">
                <span><b>Cost:</b> {{ $vehicle->getSumTotalCost() }} $$$</span>
            </div>
        </div>
        <div class="flex mxn2 px2">
            <div class="flex-auto col-6">
                <span><b>Avg. usage:</b> {{ $vehicle->getAverageUsage() }} liter / 100 km</span>
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="right">
            {!! link_to_route('vehicles.show', 'More Information', [$vehicle->id], ['class' => 'button button-transparent h5 m1']) !!}
            {!! link_to_route('vehicles.logs.create', 'New Log', [$vehicle->id], ['class' => 'button button-transparent h5 m1']) !!}
        </div>
    </div>
</div>