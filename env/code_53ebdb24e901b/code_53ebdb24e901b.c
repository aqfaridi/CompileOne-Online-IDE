#include<stdio.h>
#include<string.h>
#define MAXLENGTH 65536

#define NOTINCOMMENT 0
#define SINGLECOMMENT 1
#define MULTICOMMENT 2
int status= NOTINCOMMENT;
int in_string= 0;
char* stripcomment (char* strip , char* code)
 {
     int ndx;
     int odx;
     char ch;
     char prevch;
     for(ndx=odx=0;ndx<strlen(code);ndx++)
      {
          char current=code[ndx];
          if(in_string ) 
          {
              if(current='"') in_string=0;
              strip[odx++]=current;
          }
          else
          {
            if (status==NOTINCOMMENT)
            {
                if(current=='"')
                {
                    strip[odx++]=current;
                    in_string=1;
                    continue;
                }
            if(current=='/'&& prevch=='/') status=SINGLECOMMENT;
            else if (current='*'&& prevch=='/')status=MULTICOMMENT;
            else if (current != '/' || (current == '/' && ndx < strlen(code)-1 && !(code[ndx+1] == '/' || code[ndx+1] == '*'))) strip[odx++] = current;

            }
            else if(status==SINGLECOMMENT)
             {
                 if(current=='\n')
                 {
                     status=NOTINCOMMENT;
                     strip[odx++]=current;
                     
                 }
             }
             else if (status=MULTICOMMENT)
              {
                  if(current='/'&& prevch=='*')
                  {
                      status=NOTINCOMMENT;
                  }
              }
              
          }
          
         prevch=current; 
      }
    strip[odx] ='/0' ;
    return (strip);
 }
 Void main()
 {
     char code[MAXLENGTH];
     char strip[MAXLENGTH];
     gets(code);
     stripcomment(strip,code);
     if(strlen(strip)>0)
     printf("%s",strip);
 }
