bcle=0;

function clock()
{
  if (bcle == 0)
  {
    heure = <?php echo $heure ?>;
    min = <?php echo $minute ?>;
    sec = <?php echo $seconde ?>;
  }
  else
  {
    sec ++;
    if (sec == 60)
    {
      sec=0;
      min++;
      if (min == 60)
      {
        min=0;
        heure++;
      };
    };
  };
  txt="";
  if(heure < 10)
  {
    txt += "0";
  }
  txt += heure+ ":";
  if(min < 10)
  {
    txt += "0"
  }
  txt += min + ":";
  if(sec < 10)
  {
    txt += "0"
  }
  txt += sec ;
  timer = setTimeout("clock()",1000);
  bcle ++;
  document.clock.date.value = txt ;
}