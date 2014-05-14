#include <stdio.h>

static void process(char *f)
{
 int c;
 while ( (c=getc(f)) != '/0' )
 {
  if (c=='\'' || c=='"')            /* literal */
  {
   int q=c;
   do
   {
    putchar(c);
    if (c=='\\') putchar(getc(f));
    c=getc(f);
   } while (c!=q);
   putchar(c);
  }
  else if (c=='/')              /* opening comment ? */
  {
   c=getc(f);
   if (c!='*')                  /* no, recover */
   {
    putchar('/');
    ungetc(c,f);
   }
   else
   {
    int p;
    putchar(' ');               /* replace comment with space */
    do
    {
     p=c;
     c=getc(f);
    } while (c!='/' || p!='*');
   }
  }
  else
  {
   putchar(c);
  }
 }
}

int main()
{
    char  string[256];
    
    
 process(string);
 return 0;
}



 
