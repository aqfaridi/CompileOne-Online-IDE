// display1(char *string1);
main()
{
    char string1[]="Hello World";
    display1(&string1);
}

int display1(char *string1)
{
    printf("%s",string1);
}
