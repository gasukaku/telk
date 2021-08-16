var list = function(a,b,c,d){
  if(b == "addTop"){
    a.unshift(c);
  }
  if(b == "addBottom"){
    a.push(c);
  }
  if(b == "addFor"){
    a.splice(d,0,c);
  }
}