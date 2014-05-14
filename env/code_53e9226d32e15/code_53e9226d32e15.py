# your code goes here
from tkinter import *

import numpy
from numpy import *
import numpy as np
import sys

clear=0

def main():
    root=Tk()
    root.title("Matrix")
    root.geometry('800x800')

    MainWin=Frame(root)
    SideBar=Frame(root)
    SideBar.grid(column=0)

    def quit():
        print("Goodbye")
        sys.exit(0)
    quitButton=Button(width=4, text="Quit" , command=quit, fg="red")
    quitButton.grid(column=0,row=10)
    
    def MatrixReloaded(n):

        MainWin.grid(column=1,row=0,sticky='ne')
        global clear
        clear+=1
        if clear>1:
            MainWin.grid_forget()
            clear=0
            return 

        i=0
        j=0
        A=[[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]]
        textEntryA=[[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]]
        for i in range(int(n)):
            for j in range(int(n)):
                A[i][j]=DoubleVar()
                A[i][j].set(" ")
                textEntryA[i][j]=Entry(MainWin,width=8,textvariable=A[i][j])
                textEntryA[i][j].grid(row=i+2, column=j+1)

        B=[[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]]
        textEntryB=[[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]]
        i=0
        j=0
        for i in range(int(n)):
            for j in range(int(n)):
                B[i][j]=DoubleVar()
                B[i][j].set(" ")
                textEntryB[i][j]=Entry(MainWin,width=8,textvariable=B[i][j])
                textEntryB[i][j].grid(row=i+2,column=n+j+2)
        
        space=Label(MainWin,text="    ")
        space.grid(row=1,column=n+1)  
        MatrixALabel=Label(MainWin,text="Matrix A")
        MatrixALabel.grid(row=0,column=n-1)
        MatrixBLabel=Label(MainWin,text="Matrix B")
        MatrixBLabel.grid(row=0,column=2*n)

        def printMatrixA(char,n):
            i=0
            j=0
            MatrixA=np.matrix([[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]])
            for i in range(int(n)):
                for j in range(int(n)):
                    MatrixA[i,j]=A[i][j].get()
             
            i=0
            j=0              
            MatrixB=np.array([[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]])
            for i in range(int(n)):
                for j in range(int(n)):
                    MatrixB[i,j]=B[i][j].get()
                          
            op(MatrixA,MatrixB,char,n)

        def op(MatrixA,MatrixB,char,n):
            if(char=='*'):
                result=MatrixA*MatrixB
            if(char=='+'):
                result=MatrixA+MatrixB
            if(char=='-'):
                result=MatrixA-MatrixB
            if(char=='AI'):
                result=MatrixA.I
            if(char=='BI'):
                result=MatrixB.I
            
            print("[",end=' ')
            for i in range(int(n)):
                print()
                for j in range(int(n)):
                    print(",     ",result[i,j],end=' ')
            print("]")
            print()

            

        multi=Button(SideBar,width=4,text="*",command=lambda: printMatrixA('*',n) )
        multi.grid(column=0,row=6)
        plus=Button(SideBar,width=4,text="+",command=lambda: printMatrixA('+',n) )
        plus.grid(column=0,row=4)
        minus=Button(SideBar,width=4,text="-",command=lambda: printMatrixA('-',n) )
        minus.grid(column=0,row=5)
        AI=Button(SideBar,text="A inv",width=4,command=lambda: printMatrixA('AI',n) )
        AI.grid(column=0,row=7)
        BI=Button(SideBar,text="B inv",width=4,command=lambda: printMatrixA('BI',n) )
        BI.grid(column=0,row=8)
      



    def solvingMatrix(n):
        MainWin.grid(column=1,row=1)
        i=0
        j=0
        A=[[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]]
        textEntryA=[[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]]
        for i in range(int(n)):
            for j in range(int(n)):
                A[i][j]=DoubleVar()
                A[i][j].set(" ")
                textEntryA[i][j]=Entry(MainWin,width=8,textvariable=A[i][j])
                textEntryA[i][j].grid(row=i+2, column=j+1)

        i=0
        B=[[0],[0],[0],[0],[0]]
        textEntryB=[[0],[0],[0],[0],[0]]
        for i in range(int(n)):
            B[i][0]=DoubleVar()
            B[i][0].set(" ")
            textEntryB[i][0]=Entry(MainWin,width=8,textvariable=B[i][0])
            textEntryB[i][0].grid(row=i+2,column=n+2)

        space=Label(MainWin,text="    ")
        space.grid(row=1,column=n+1)  
        MatrixALabel=Label(MainWin,text="Matrix A")
        MatrixALabel.grid(row=0,column=n-1)
        MatrixBLabel=Label(MainWin,text="Matrix B")
        MatrixBLabel.grid(row=0,column=n+2)


        def printSolve(n):

            i=0
            j=0
            MatrixA=np.ndarray(shape=(n,n) )
            for i in range(int(n)):
                for j in range(int(n)):
                    MatrixA[i,j]=A[i][j].get()
             
            j=0            
            MatrixB=np.ndarray(shape=(n,1))
            for j in range(int(n)):
                    MatrixB[j,0]=B[j][0].get()

            solve= np.linalg.solve(MatrixA,MatrixB)
            print(solve)
            print()
            

        Solve=Button(SideBar,width=10,text="solve" , command=lambda: printSolve(n) )
        Solve.grid(column=0,row=4)





    n=IntVar()
    n.set("n here")
    n=Entry(SideBar,width=8,textvariable=n)
    n.grid(column=0,row=1)
    NOnN=Button(SideBar,width=4,text="nxn" , command=lambda: MatrixReloaded( int(n.get())) )
    NOnN.grid(column=0,row=2)           
        
    SolveMatrix=Button(SideBar,width=10,text="solving matrix" , command=lambda: solvingMatrix( int(n.get())) )
    SolveMatrix.grid(column=0,row=3)

    



    root.mainloop()

if __name__ == "__main__":
    main()