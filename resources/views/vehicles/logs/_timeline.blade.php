<ul class="list-reset timeline">
    @foreach($logs as $log)
    <li class="timeline-item mb3" id="log-item--{{ $log->id }}">
        <div class="clearfix">
            <div class="col col-3 md-col-2 bold primary p1 bg-white">
                <time>{{ $log->log_date->format('d.m.Y') }}</time>
            </div>
            <div class="col col-9 md-col-10 p1">


                <ul>
                    <li>Fueled: {{ $log->fueled_units }}</li>
                    <li>Cost per Unit: {{ $log->cost_per_unit }}</li>
                    <li>Total Cost: {{ $log->cost_total }}</li>
                    <li>Driven Units: {{ $log->driven_units }}</li>
                    <li><b>Average Usage:</b> {{ $log->average_usage }}</li>
                </ul>


            <div class="clearfix border-top">
                <div class="">
                    {!! link_to_route('vehicles.logs.edit', 'Edit Log', [$log->vehicle->id, $log->id], ['class' => 'button bg-primary button-small m1 h5 regular button-upper']) !!}
                    {!! link_to_route('vehicles.logs.show', 'More Info', [$log->vehicle->id, $log->id], ['class' => 'button bg-primary button-small m1 h5 regular button-upper']) !!}
                </div>
            </div>


            </div>
        </div>


    </li>


    @endforeach
</ul>