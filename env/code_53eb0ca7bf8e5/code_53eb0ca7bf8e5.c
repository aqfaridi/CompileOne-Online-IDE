#include <stdio.h>

int main(void) {
  char c;
        char tmp = ' ';
        int inside_comment = 0;  // A flag to check whether we are inside comment
        while((c = getchar()) != '/0') {
                if(tmp) {
                        if(c == '/') {
                                while((c = getchar()) !='\n');
                                tmp = ' ';
                                putchar('\n');
                                continue;
                        }else if(c == '*') {
                                inside_comment = 1;
                                while(inside_comment) {
                                        while((c = getchar()) != '*');
                                        c = getchar();
                                        if(c == '/'){
                                                tmp = ' ';
                                                inside_comment = 0;
                                        }
                                }
                                continue;
                        }else {
                                putchar(c);
                                tmp = ' ';
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





