import time
import win32api,win32gui,win32con
from ctypes import *

def clickLeftCur():
	win32api.mouse_event(win32con.MOUSEEVENTF_LEFTDOWN|win32con.MOUSEEVENTF_LEFTUP, 0, 0)

def moveCurPos(x,y):
    windll.user32.SetCursorPos(x, y)
	
def getCurPos():
    return win32gui.GetCursorPos()

def doit():
	#获取鼠标当前位置
	xy=getCurPos()
	#向右移动100个像素
	moveCurPos(xy[0]-392, xy[1])
	#单击鼠标左键
	clickLeftCur()

	win32api.keybd_event(17,0,0,0) #ctrl键位码是17
	win32api.keybd_event(83,0,0,0) #v键位码是86
	win32api.keybd_event(83,0,win32con.KEYEVENTF_KEYUP,0) #释放按键
	win32api.keybd_event(17,0,win32con.KEYEVENTF_KEYUP,0)	

	time.sleep(1)
	#向右移动100个像素
	xy=getCurPos()
	moveCurPos(xy[0]+324, xy[1]+147)
	#单击鼠标左键
	clickLeftCur()

	time.sleep(1)
	xy=getCurPos()
	moveCurPos(xy[0]+68, xy[1]-147)



count = 0
while (count < 100):
   doit()
   count = count + 1






