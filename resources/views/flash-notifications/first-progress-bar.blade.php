<div class="col-sm-10 col-sm-offset-1">
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="{{ (isset($pro_bar)) ? $pro_bar : 0 }}"
             aria-valuemin="0" aria-valuemax="100" style="width:{{ (isset($pro_bar)) ? $pro_bar : 0  }}%; " >
            {{ (isset($pro_bar)) ? $pro_bar : 0 }}%

        </div>
    </div>
</div>