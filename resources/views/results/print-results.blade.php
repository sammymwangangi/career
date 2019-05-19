<!DOCTYPE html>
<html>
<head>
    <title>Results List</title>
     <style>
    #layout {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top: 110px;
        caption-side: top;
    }

    #layout td, #layout th {
        border: 1px solid #ddd;
        padding: 8px;
    }


    #layout tr:hover {background-color: #ddd;}

    #layout th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color:#eceff1;
        color: #222222;
    }
 caption{
font-size: 26px;
font-weight: bold;
color:#222222;
padding: .2em .8em;
}
   /* Create 2 unequal columns that floats next to each other */
}
.column {
    float: left;
    padding: 10px;
    height: 5px; /* Should be removed. Only for demonstration */
}

.left {
  width: 35%;
}

.right {
  width: 65%;
}

/* Clear floats after the columns */
.header:after {
    content: "";
    display: table;
    clear: both;
}
    </style>
</head>
<body>
      <div class="header">
    <div class="column left"><img src="{{ public_path('/images/online.jpg') }}" alt="LOGO" style="width: 150px; height: 100px"></div>
    <div class="column right"><h1>E-CAREER GUIDANCE SYSTEM</h1>
                              <h4>P.O. BOX 96 NAIROBI</h4>
                              <h4><i>System to suggest for you the best career based on your IQ and Personality Tests</i></h4>
                          </div>
              </div>
              <h6>&nbsp;</h6>

<table id="layout">
    <caption>ALL RESULTS</caption>
     <thead>
        <tr class="">
            <th>#</th>
            <th>USER</th>
            <th>DATE</th>
            <th>RESULT</th>
            <th>IQ</th>
            <th>PERSONALITY TYPE</th>
        </tr>
    </thead>
    <tbody>
        @forelse($results as $i=> $result)
            <tr>
             <td>{{ $i+1 }}</td>
             <td>{{ $result->user->name or '' }} ({{ $result->user->email or '' }})</td>
             <td>{{ $result->created_at or ''  }}</td>
             <td>{{ $result->result }}/ {{ (count($questions)) }}</td>
             <td>{{ (($result->result) * 200) / (count($questions)) }}</td>
             @if ( ($result->result) >= 7)
            <td>Choleric</td>
            @elseif ( ($result->result) <= 2)
            <td>Sanguine</td>
            @elseif ( ($result->result) == 6)
            <td>Phlegmatic</td>
            @else ( ($result->result) == 4)
            <td>Melancholic</td>
            @endif
            </tr>
          @empty
         <p>No data found</p>
         @endforelse
    </tbody>
</table>
</body>
</html>

