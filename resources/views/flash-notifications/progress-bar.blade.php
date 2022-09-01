<div class="col-sm-10 col-sm-offset-1">
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="{{ (isset($pro_bar)) ? $pro_bar : 0 }}"
             aria-valuemin="0" aria-valuemax="100" style="width:{{ (isset($pro_bar)) ? $pro_bar : 0  }}%; " >
            {{ (isset($pro_bar)) ? $pro_bar : 0 }}%
                <a class="section-highlighter" title="Pricing & Financial" style="left: 9.5%;" href="{{route('load.financial.cover.page',$memorandum->id)}}"></a>
                <a class="section-highlighter" title="Property Description" style="left: 38%;" href="{{route('load.description.cover.page',$memorandum->id)}}"></a>
                <a class="section-highlighter" title="Recent Sales" style="left: 57.5%;" href="{{route('load.recent-sales.section.cover',$memorandum->id)}}"></a>
                <a class="section-highlighter" title="Rent Comparable" style="left: 67.5%;" href="{{route('load.rent-comparables.section.cover',$memorandum->id)}}"></a>
                <a class="section-highlighter" title="Demographic Analysis" style="left: 77.4%;" href="{{route('load.demographic.section.cover',$memorandum->id)}}"></a>
                <a class="section-highlighter" title="Market Comparable" style="left: 82.2%;" href="{{route('load.market-comparable.section.cover',$memorandum->id)}}"></a>
                <a class="section-highlighter" title="Market Plan" style="left: 96%;" href="{{route('load.market-plan.section.cover',$memorandum->id)}}"></a>

        </div>
    </div>
</div>