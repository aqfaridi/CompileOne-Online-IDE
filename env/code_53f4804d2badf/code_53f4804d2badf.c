#include<stdio.h>
#include<conio.h>
int NAND(int a,int b);
int main()
{

int gat1,gat2,gat3,gat6,gat7,fan6,fan8,fan9,gat10,gat11,fan14,fan15,gat16,gat19,fan20,fan21,gat22,gat23;
clrscr();
printf("entet the value of gat1 = \n");
printf("entet the value of gat2 = \n ");
printf("entet the value of gat3 = \n ");
printf("entet the value of gat6 = \n ");
printf("entet the value of gat7 = \n ");
scanf("%d%d%d%d%d",&gat1,&gat2,&gat3,&gat6,&gat7);
fan8=gat3;
gat10=NAND(gat1,fan8);
fan9=fan8;
gat11=NAND(fan9,gat6);
fan14=gat11;
gat16=NAND(gat2,fan14);
fan15=fan14;
gat19=NAND(fan15,gat7);
fan20=gat16;
gat22=NAND(gat10,fan20);
fan21=fan20;
gat23=NAND(fan21,gat19);
printf("gat22 =%d",gat22);
printf("gat23 =%d",gat23);
getch();
return  0;
}
int NAND(int a, int b)
{
int out;
if(a==0 && b==0)
out=1;
if(a==0 && b==1)
out=1;
if(a==1 && b==0)
out=1;
if(a==1 && b==1)
out=0;
return (out);
}
