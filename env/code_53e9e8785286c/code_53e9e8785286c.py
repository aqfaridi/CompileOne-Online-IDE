# your code goes here
import math

def MenuFunction():
    print "Please Select option from the following..\n"
    print "1.Add\n2.Multiply\n3.Substract"
    choice = raw_input("")
    if(choice == 1):
        Addf()
    if(choice == 2):
        Mutlfif()
    if(choice == 3):
        Subf()
    
MenuFunction()