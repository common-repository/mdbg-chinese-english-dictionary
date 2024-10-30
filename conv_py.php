<?php
/*
Pinyin to Unicode Converter
Copyright (C) 2002  Konrad Mitchell Lawson
http://www.foolsworkshop.com/
http://konrad.lawson.net/

Please leave this initial header intact when
distributing modified versions of this script.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

License available at:
http://www.gnu.org/copyleft/gpl.html
*/
//Special thanks to James Dew and Helmer Aslaksen
//modified for this script (yase-4-CEDICT), added 4 lines
//modified for usage with MDGB.NET dictionary
function convertPinyinToneNumbersToMarks($syllablefinal) {
		// move erhua -r behind the tone number so it won't influence the syllable
		$syllablefinal = preg_replace('/([^e ])(r)([1-5])/u', '$1$3$2', $syllablefinal);
		// convert r5 to r
		$syllablefinal = preg_replace('/(\'|-| |^)(r)(5)/u', '$1$2', $syllablefinal);
		
//convert all pinyin to a standard intermediary encoding
$syllablefinal=str_replace("ang1","//aq//ng",$syllablefinal);
$syllablefinal=str_replace("ang2","//aw//ng",$syllablefinal);
$syllablefinal=str_replace("ang3","//ae//ng",$syllablefinal);
$syllablefinal=str_replace("ang4","//ar//ng",$syllablefinal);
$syllablefinal=str_replace("ang5","ang",$syllablefinal);
$syllablefinal=str_replace("Ang1","//Aq//ng",$syllablefinal);
$syllablefinal=str_replace("Ang2","//Aw//ng",$syllablefinal);
$syllablefinal=str_replace("Ang3","//Ae//ng",$syllablefinal);
$syllablefinal=str_replace("Ang4","//Ar//ng",$syllablefinal);
$syllablefinal=str_replace("Ang5","Ang",$syllablefinal);
$syllablefinal=str_replace("eng1","//eq//ng",$syllablefinal);
$syllablefinal=str_replace("eng2","//ew//ng",$syllablefinal);
$syllablefinal=str_replace("eng3","//ee//ng",$syllablefinal);
$syllablefinal=str_replace("eng4","//er//ng",$syllablefinal);
$syllablefinal=str_replace("eng5","eng",$syllablefinal);
$syllablefinal=str_replace("Eng1","//Eq//ng",$syllablefinal);
$syllablefinal=str_replace("Eng2","//Ew//ng",$syllablefinal);
$syllablefinal=str_replace("Eng3","//Ee//ng",$syllablefinal);
$syllablefinal=str_replace("Eng4","//Er//ng",$syllablefinal);
$syllablefinal=str_replace("Eng5","Eng",$syllablefinal);
$syllablefinal=str_replace("ing1","//iq//ng",$syllablefinal);
$syllablefinal=str_replace("ing2","//iw//ng",$syllablefinal);
$syllablefinal=str_replace("ing3","//ie//ng",$syllablefinal);
$syllablefinal=str_replace("ing4","//ir//ng",$syllablefinal);
$syllablefinal=str_replace("ing5","ing",$syllablefinal);
$syllablefinal=str_replace("ong1","//oq//ng",$syllablefinal);
$syllablefinal=str_replace("ong2","//ow//ng",$syllablefinal);
$syllablefinal=str_replace("ong3","//oe//ng",$syllablefinal);
$syllablefinal=str_replace("ong4","//or//ng",$syllablefinal);
$syllablefinal=str_replace("ong5","ong",$syllablefinal);
$syllablefinal=str_replace("an1","//aq//n",$syllablefinal);
$syllablefinal=str_replace("an2","//aw//n",$syllablefinal);
$syllablefinal=str_replace("an3","//ae//n",$syllablefinal);
$syllablefinal=str_replace("an4","//ar//n",$syllablefinal);
$syllablefinal=str_replace("an5","an",$syllablefinal);
$syllablefinal=str_replace("An1","//Aq//n",$syllablefinal);
$syllablefinal=str_replace("An2","//Aw//n",$syllablefinal);
$syllablefinal=str_replace("An3","//Ae//n",$syllablefinal);
$syllablefinal=str_replace("An4","//Ar//n",$syllablefinal);
$syllablefinal=str_replace("An5","An",$syllablefinal);
$syllablefinal=str_replace("en1","//eq//n",$syllablefinal);
$syllablefinal=str_replace("en2","//ew//n",$syllablefinal);
$syllablefinal=str_replace("en3","//ee//n",$syllablefinal);
$syllablefinal=str_replace("en4","//er//n",$syllablefinal);
$syllablefinal=str_replace("en5","en",$syllablefinal);
$syllablefinal=str_replace("En1","//Eq//n",$syllablefinal);
$syllablefinal=str_replace("En2","//Ew//n",$syllablefinal);
$syllablefinal=str_replace("En3","//Ee//n",$syllablefinal);
$syllablefinal=str_replace("En4","//Er//n",$syllablefinal);
$syllablefinal=str_replace("En5","En",$syllablefinal);
$syllablefinal=str_replace("in1","//iq//n",$syllablefinal);
$syllablefinal=str_replace("in2","//iw//n",$syllablefinal);
$syllablefinal=str_replace("in3","//ie//n",$syllablefinal);
$syllablefinal=str_replace("in4","//ir//n",$syllablefinal);
$syllablefinal=str_replace("in5","in",$syllablefinal);
$syllablefinal=str_replace("un1","//uq//n",$syllablefinal);
$syllablefinal=str_replace("un2","//uw//n",$syllablefinal);
$syllablefinal=str_replace("un3","//ue//n",$syllablefinal);
$syllablefinal=str_replace("un4","//ur//n",$syllablefinal);
$syllablefinal=str_replace("un5","un",$syllablefinal);
$syllablefinal=str_replace("ao1","//aq//o",$syllablefinal);
$syllablefinal=str_replace("ao2","//aw//o",$syllablefinal);
$syllablefinal=str_replace("ao3","//ae//o",$syllablefinal);
$syllablefinal=str_replace("ao4","//ar//o",$syllablefinal);
$syllablefinal=str_replace("ao5","ao",$syllablefinal);
$syllablefinal=str_replace("Ao1","//Aq//o",$syllablefinal);
$syllablefinal=str_replace("Ao2","//Aw//o",$syllablefinal);
$syllablefinal=str_replace("Ao3","//Ae//o",$syllablefinal);
$syllablefinal=str_replace("Ao4","//Ar//o",$syllablefinal);
$syllablefinal=str_replace("Ao5","Ao",$syllablefinal);
$syllablefinal=str_replace("ou1","//oq//u",$syllablefinal);
$syllablefinal=str_replace("ou2","//ow//u",$syllablefinal);
$syllablefinal=str_replace("ou3","//oe//u",$syllablefinal);
$syllablefinal=str_replace("ou4","//or//u",$syllablefinal);
$syllablefinal=str_replace("ou5","ou",$syllablefinal);
$syllablefinal=str_replace("Ou1","//Oq//u",$syllablefinal);
$syllablefinal=str_replace("Ou2","//Ow//u",$syllablefinal);
$syllablefinal=str_replace("Ou3","//Oe//u",$syllablefinal);
$syllablefinal=str_replace("Ou4","//Or//u",$syllablefinal);
$syllablefinal=str_replace("Ou5","Ou",$syllablefinal);
$syllablefinal=str_replace("ai1","//aq//i",$syllablefinal);
$syllablefinal=str_replace("ai2","//aw//i",$syllablefinal);
$syllablefinal=str_replace("ai3","//ae//i",$syllablefinal);
$syllablefinal=str_replace("ai4","//ar//i",$syllablefinal);
$syllablefinal=str_replace("ai5","ai",$syllablefinal);
$syllablefinal=str_replace("Ai1","//Aq//i",$syllablefinal);
$syllablefinal=str_replace("Ai2","//Aw//i",$syllablefinal);
$syllablefinal=str_replace("Ai3","//Ae//i",$syllablefinal);
$syllablefinal=str_replace("Ai4","//Ar//i",$syllablefinal);
$syllablefinal=str_replace("Ai5","Ai",$syllablefinal);
$syllablefinal=str_replace("ei1","//eq//i",$syllablefinal);
$syllablefinal=str_replace("ei2","//ew//i",$syllablefinal);
$syllablefinal=str_replace("ei3","//ee//i",$syllablefinal);
$syllablefinal=str_replace("ei4","//er//i",$syllablefinal);
$syllablefinal=str_replace("ei5","ei",$syllablefinal);
$syllablefinal=str_replace("Ei1","//Eq//i",$syllablefinal);
$syllablefinal=str_replace("Ei2","//Ew//i",$syllablefinal);
$syllablefinal=str_replace("Ei3","//Ee//i",$syllablefinal);
$syllablefinal=str_replace("Ei4","//Er//i",$syllablefinal);
$syllablefinal=str_replace("Ei5","Ei",$syllablefinal);
$syllablefinal=str_replace("a1","//aq//",$syllablefinal);
$syllablefinal=str_replace("a2","//aw//",$syllablefinal);
$syllablefinal=str_replace("a3","//ae//",$syllablefinal);
$syllablefinal=str_replace("a4","//ar//",$syllablefinal);
$syllablefinal=str_replace("a5","a",$syllablefinal);
$syllablefinal=str_replace("A1","//Aq//",$syllablefinal);
$syllablefinal=str_replace("A2","//Aw//",$syllablefinal);
$syllablefinal=str_replace("A3","//Ae//",$syllablefinal);
$syllablefinal=str_replace("A4","//Ar//",$syllablefinal);
$syllablefinal=str_replace("A5","A",$syllablefinal);
$syllablefinal=str_replace("er1","//eq//r",$syllablefinal);
$syllablefinal=str_replace("er2","//ew//r",$syllablefinal);
$syllablefinal=str_replace("er3","//ee//r",$syllablefinal);
$syllablefinal=str_replace("er4","//er//r",$syllablefinal);
$syllablefinal=str_replace("er5","er",$syllablefinal);
$syllablefinal=str_replace("Er1","//Eq//r",$syllablefinal);
$syllablefinal=str_replace("Er2","//Ew//r",$syllablefinal);
$syllablefinal=str_replace("Er3","//Ee//r",$syllablefinal);
$syllablefinal=str_replace("Er4","//Er//r",$syllablefinal);
$syllablefinal=str_replace("Er5","Er",$syllablefinal);
//$syllablefinal=str_replace("lyue","l//v//e",$syllablefinal);
//$syllablefinal=str_replace("nyue","n//v//e",$syllablefinal);
$syllablefinal=str_replace("e1","//eq//",$syllablefinal);
$syllablefinal=str_replace("e2","//ew//",$syllablefinal);
$syllablefinal=str_replace("e3","//ee//",$syllablefinal);
$syllablefinal=str_replace("e4","//er//",$syllablefinal);
$syllablefinal=str_replace("e5","e",$syllablefinal);
$syllablefinal=str_replace("E1","//Eq//",$syllablefinal);
$syllablefinal=str_replace("E2","//Ew//",$syllablefinal);
$syllablefinal=str_replace("E3","//Ee//",$syllablefinal);
$syllablefinal=str_replace("E4","//Er//",$syllablefinal);
$syllablefinal=str_replace("E5","E",$syllablefinal);
$syllablefinal=str_replace("o1","//oq//",$syllablefinal);
$syllablefinal=str_replace("o2","//ow//",$syllablefinal);
$syllablefinal=str_replace("o3","//oe//",$syllablefinal);
$syllablefinal=str_replace("o4","//or//",$syllablefinal);
$syllablefinal=str_replace("o5","o",$syllablefinal);
$syllablefinal=str_replace("O1","//Oq//",$syllablefinal);
$syllablefinal=str_replace("O2","//Ow//",$syllablefinal);
$syllablefinal=str_replace("O3","//Oe//",$syllablefinal);
$syllablefinal=str_replace("O4","//Or//",$syllablefinal);
$syllablefinal=str_replace("O5","O",$syllablefinal);
$syllablefinal=str_replace("i1","//iq//",$syllablefinal);
$syllablefinal=str_replace("i2","//iw//",$syllablefinal);
$syllablefinal=str_replace("i3","//ie//",$syllablefinal);
$syllablefinal=str_replace("i4","//ir//",$syllablefinal);
$syllablefinal=str_replace("i5","i",$syllablefinal);
$syllablefinal=str_replace("nyu3","n//ve//",$syllablefinal); // ?????
$syllablefinal=str_replace("lyu","l//v//",$syllablefinal); // ?????
$syllablefinal=str_replace("v1","//vq//",$syllablefinal);
$syllablefinal=str_replace("v2","//vw//",$syllablefinal);
$syllablefinal=str_replace("v3","//ve//",$syllablefinal);
$syllablefinal=str_replace("v4","//vr//",$syllablefinal);
$syllablefinal=str_replace("v5","ü",$syllablefinal);
//$syllablefinal=str_replace("v0","//vs//",$syllablefinal);
$syllablefinal=str_replace("ü1","//vq//",$syllablefinal);
$syllablefinal=str_replace("ü2","//vw//",$syllablefinal);
$syllablefinal=str_replace("ü3","//ve//",$syllablefinal);
$syllablefinal=str_replace("ü4","//vr//",$syllablefinal);
$syllablefinal=str_replace("ü5","ü",$syllablefinal);
$syllablefinal=str_replace("u1","//uq//",$syllablefinal);
$syllablefinal=str_replace("u2","//uw//",$syllablefinal);
$syllablefinal=str_replace("u3","//ue//",$syllablefinal);
$syllablefinal=str_replace("u4","//ur//",$syllablefinal);
$syllablefinal=str_replace("u5","u",$syllablefinal);

//convert this intermediary encoding to unicode
$syllablefinal=str_replace("//aq//","ā",$syllablefinal);
$syllablefinal=str_replace("//aw//","á",$syllablefinal);
$syllablefinal=str_replace("//ae//","ǎ",$syllablefinal);
$syllablefinal=str_replace("//ar//","à",$syllablefinal);
$syllablefinal=str_replace("//Aq//","Ā",$syllablefinal);
$syllablefinal=str_replace("//Aw//","Á",$syllablefinal);
$syllablefinal=str_replace("//Ae//","Ǎ",$syllablefinal);
$syllablefinal=str_replace("//Ar//","À",$syllablefinal);
$syllablefinal=str_replace("//eq//","ē",$syllablefinal);
$syllablefinal=str_replace("//ew//","é",$syllablefinal);
$syllablefinal=str_replace("//ee//","ě",$syllablefinal);
$syllablefinal=str_replace("//er//","è",$syllablefinal);
$syllablefinal=str_replace("//Eq//","Ē",$syllablefinal);
$syllablefinal=str_replace("//Ew//","É",$syllablefinal);
$syllablefinal=str_replace("//Ee//","Ě",$syllablefinal);
$syllablefinal=str_replace("//Er//","È",$syllablefinal);
$syllablefinal=str_replace("//iq//","ī",$syllablefinal);
$syllablefinal=str_replace("//iw//","í",$syllablefinal);
$syllablefinal=str_replace("//ie//","ǐ",$syllablefinal);
$syllablefinal=str_replace("//ir//","ì",$syllablefinal);
$syllablefinal=str_replace("//Iq//","Ī",$syllablefinal);
$syllablefinal=str_replace("//Iw//","Í",$syllablefinal);
$syllablefinal=str_replace("//Ie//","Ǐ",$syllablefinal);
$syllablefinal=str_replace("//Ir//","Ì",$syllablefinal);
$syllablefinal=str_replace("//oq//","ō",$syllablefinal);
$syllablefinal=str_replace("//ow//","ó",$syllablefinal);
$syllablefinal=str_replace("//oe//","ǒ",$syllablefinal);
$syllablefinal=str_replace("//or//","ò",$syllablefinal);
$syllablefinal=str_replace("//Oq//","Ō",$syllablefinal);
$syllablefinal=str_replace("//Ow//","Ó",$syllablefinal);
$syllablefinal=str_replace("//Oe//","Ǒ",$syllablefinal);
$syllablefinal=str_replace("//Or//","Ò",$syllablefinal);
$syllablefinal=str_replace("//uq//","ū",$syllablefinal);
$syllablefinal=str_replace("//uw//","ú",$syllablefinal);
$syllablefinal=str_replace("//ue//","ǔ",$syllablefinal);
$syllablefinal=str_replace("//ur//","ù",$syllablefinal);
$syllablefinal=str_replace("//Uq//","Ū",$syllablefinal);
$syllablefinal=str_replace("//Uw//","Ú",$syllablefinal);
$syllablefinal=str_replace("//Ue//","Ǔ",$syllablefinal);
$syllablefinal=str_replace("//Ur//","Ù",$syllablefinal);
$syllablefinal=str_replace("//vq//","ǖ",$syllablefinal);
$syllablefinal=str_replace("//vw//","ǘ",$syllablefinal);
$syllablefinal=str_replace("//ve//","ǚ",$syllablefinal);
$syllablefinal=str_replace("//vr//","ǜ",$syllablefinal);
//$syllablefinal=str_replace("//vs//","&#252;",$syllablefinal);
$syllablefinal=str_replace("//Vq//","Ǖ",$syllablefinal);
$syllablefinal=str_replace("//Vw//","Ǘ",$syllablefinal);
$syllablefinal=str_replace("//Ve//","Ǚ",$syllablefinal);
$syllablefinal=str_replace("//Vr//","Ǜ",$syllablefinal);

//$syllablefinal=str_replace("//aaq//","&#256;",$syllablefinal);
//Do we need aa2 and aa3?
//$syllablefinal=str_replace("//aaw//","&#192;",$syllablefinal);
//$syllablefinal=str_replace("//aae//","&#461;",$syllablefinal);
//$syllablefinal=str_replace("//aar//","&#191;",$syllablefinal);
//Do we need the capital Es?
//$syllablefinal=str_replace("//eeq//","&#274;",$syllablefinal);
//$syllablefinal=str_replace("//eew//","&#201;",$syllablefinal);
//$syllablefinal=str_replace("//eer//","&#200;",$syllablefinal);

return ($syllablefinal);

}
