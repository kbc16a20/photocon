<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>サンプル</title>
</head>
<body>
<ul>
  <li>{$fruits[0]}</li>
  <li>{$fruits[1]}</li>
  <li>{$fruits[2]}</li>
</ul>

<ul>
  <li>{$fruits2.apple}</li>
  <li>{$fruits2.orange}</li>
  <li>{$fruits2.grape}</li>
</ul>
{if $sample == 10}<p>sample is 10</p>
{elseif $sample > 5}<p>sample larger than 5</p>
{else}<p>sample less than 5</p>
{/if}
<ul>
  {foreach $fruits as $fruit}
  <li>{$fruit}</li>
  {/foreach}
</ul>
<ul>
  {foreach $fruits2 as $key => $value}
  <li>{$key} ... {$value}</li>
  {/foreach}
</ul>


<!--ここに追記-->

</body>
</html>
