void main()
{
int i,j,k;
i=2;
j=4;
k=i++>j&2;
printf("%d\n",k);
if(++k && ++i<--j|| i++)
{
j=++k;
}
printf(" %d %d %d",i,-j--,k);
//getch();
}