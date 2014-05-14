#include <stdio.h>

int main(void) {
#include<stdio.h>
{        
        char c;
        char tmp = '\0';
        int inside_comment = 0;  // A flag to check whether we are inside comment
        while((c = getchar()) != EOF) {
                if(tmp) {
                        if(c == '/') {
                                while((c = getchar()) !='\n');
                                tmp = '\0';
                                putchar('\n');
                                continue;
                        }else if(c == '*') {
                                inside_comment = 1;
                                while(inside_comment) {
                                        while((c = getchar()) != '*');
                                        c = getchar();
                                        if(c == '/'){
                                                tmp = '\0';
                                                inside_comment = 0;
                                        }
                                }
                                continue;
                        }else {
                                putchar(c);
                                tmp = '\0';
                                continue;
                        }
                }
                if(c == '/') {
                        tmp = c;
                } else {
                        putchar(c);
                }
        }
        return 0;
}
}

