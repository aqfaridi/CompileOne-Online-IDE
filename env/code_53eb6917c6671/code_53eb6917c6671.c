__attribute__((constructor)) void foo_func()
{
       printf("Hello from foo_func\n");
}

int main()
{
       printf("Hello from main\n");

       return 0;
}