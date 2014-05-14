
            if (status == NOT_IN_COMMENT) {
                if (current == '"') {
                    stripped[ondx++] = current;
                    in_string = 1;
                    continue;
                }

                if (current == '/' && prevch == '/') status = SINGLE_COMMENT;
                else if (current == '*' && prevch == '/') status = MULTI_COMMENT;
                else if (current != '/' || (current == '/' && ndx < strlen(code)-1 && !(code[ndx+1] == '/' || code[ndx+1] == '*'))) stripped[ondx++] = current;
            }

            else if (status == SINGLE_COMMENT) {
                if (current == '\n') {
                    status = NOT_IN_COMMENT;
                    stripped[ondx++] = '\n';
                }
            }

            else if (status == MULTI_COMMENT) {
                if (current == '/' && prevch == '*') status = NOT_IN_COMMENT;
            }
        }
        prevch = current;
        ondx] = '\0';
    return(stripped);
}

int main(void)
{
    char code[MAX_LENGTH];        /* Buffer that stores the inputted code */
    char stripped[MAX_LENGTH];
 while( fgets(code,sizeof(code),stdin) )
    {
        //printf("%s\n",code);
        //strip comments...
        stripcomments(stripped,code);
        if( strlen(stripped) > 0 ) printf("%s",stripped);
    }
}
