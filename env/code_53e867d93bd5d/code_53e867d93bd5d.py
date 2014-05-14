# your code goes here
from PyQt4.QtCore import QObject, pyqtSignal

class Foo(QObject):

    # This defines a signal called 'closed' that takes no arguments.
    closed = pyqtSignal()

    # This defines a signal called 'rangeChanged' that takes two
    # integer arguments.
    range_changed = pyqtSignal(int, int, name='rangeChanged')

    # This defines a signal called 'valueChanged' that has two overloads,
    # one that takes an integer argument and one that takes a QString
    # argument.  Note that because we use a string to specify the type of
    # the QString argument then this code will run under Python v2 and v3.
    valueChanged = pyqtSignal([int], ['QString'])