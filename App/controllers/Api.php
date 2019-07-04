<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header( "Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Methods:POST,GET');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Api extends CI_Controller {
	public function news(){
		echo '[{"id":84480,"post_id":"5185296","title":"\u6ef4\u6ef4\u51fa\u884c\u8054\u5408\u521b\u59cb\u4eba\/CTO\u5f20\u535a\uff1a2019\u5e74\u5c06\u5728\u5168\u56fd\u589e\u52a02000\u540d\u53f8\u673a\u670d\u52a1\u987e\u95ee","author_name":"\u65f6\u6c2a\u5206\u4eab","cover":"https:\/\/pic.36krcnd.com\/201903\/14053124\/u8rgbahj9bisogda!heading","published_at":"2019-03-14 13:36:48","content":""},{"id":84478,"post_id":"5185277","title":"\u7eb3\u5c3c\uff1f\u90e8\u5206\u201c\u79cd\u8349\u7b14\u8bb0\u201d\u662f\u7f16\u7684\uff0c\u4f60\u88ab\u9a97\u4e86\u591a\u4e45\uff1f","author_name":"36\u6c2a\u7684\u670b\u53cb\u4eec","cover":"https:\/\/pic.36krcnd.com\/201903\/14040016\/7vkfpyyhm19nrsu0!heading","published_at":"2019-03-14 13:00:28","content":""},{"id":84479,"post_id":"5185264","title":"AI\uff0c\u4f1a\u8ba9\u653e\u5c04\u79d1\u533b\u751f\u4e0b\u5c97\u5417\uff1f","author_name":"\u7845\u8c37\u5bc6\u63a2","cover":"https:\/\/pic.36krcnd.com\/201903\/14041237\/zonee2cosmh7cdgs!heading","published_at":"2019-03-14 12:59:28","content":""},{"id":84477,"post_id":"5185252","title":"\u795e\u5947\u6280\u672f\u5728\u54ea\u91cc\uff1f\u5f00\u653e\u5f0f\u521b\u65b0\u5174\u8d77\u7684\u539f\u56e0","author_name":"36\u6c2a\u521b\u65b0\u54a8\u8be2","cover":"https:\/\/pic.36krcnd.com\/201903\/14040535\/6a35fw44ajuihn54!heading","published_at":"2019-03-14 12:24:09","content":""},{"id":84475,"post_id":"5185265","title":"\u7279\u65af\u62c9\u201c\u9504\u5978\u8bb0\u201d\uff1a\u9a6c\u65af\u514b\u662f\u5982\u4f55\u6253\u51fb\u62a5\u590d\u6cc4\u5bc6\u8005\u7684","author_name":"36\u6c2a\u7684\u670b\u53cb\u4eec","cover":"https:\/\/pic.36krcnd.com\/201903\/14034733\/28f31oyp7222qt3r!heading","published_at":"2019-03-14 11:58:33","content":""},{"id":84476,"post_id":"5185261","title":"Crypto Integrity \u6df1\u5ea6\u62a5\u544a\uff1aOKEx \u7b49 11 \u5bb6\u4ea4\u6613\u6240\u4ecd\u6709\u5237\u5355\u95ee\u9898","author_name":"Odaily\u661f\u7403\u65e5\u62a5","cover":"https:\/\/pic.36krcnd.com\/201903\/14033015\/tock233j07hzo65a!heading","published_at":"2019-03-14 11:56:04","content":""},{"id":84474,"post_id":"5184576","title":"\u6700\u65b0\u79d1\u7814\u9879\u76ee\uff1a\u62bd\u8840\u68c0\u6d4bDNA\uff0c\u4f60\u5c31\u80fd\u9884\u77e5\u81ea\u5df1\u7684\u5bff\u547d","author_name":"\u4e95\u5c9b\u4fca\u4e00","cover":"https:\/\/pic.36krcnd.com\/201903\/12064954\/6dw3cvw1a30j0ncj!heading","published_at":"2019-03-14 11:26:33","content":""},{"id":84473,"post_id":"5181942","title":"\u5979\u6c38\u4e0d\u56de\u5934\uff1a\u201c\u5973\u7248\u4e54\u5e03\u65af\u201d\u5728Theranos\u7684\u6700\u540e\u5c81\u6708","author_name":"boxi","cover":"https:\/\/pic.36krcnd.com\/201903\/03114636\/zegqyof8tp42is3x!heading","published_at":"2019-03-14 11:00:46","content":""},{"id":84472,"post_id":"5185246","title":"\u865a\u5047\u5ba3\u4f20\u3001\u7ed1\u5b9a\u6e56\u5357\u536b\u89c6\uff0c\u767e\u4ebf\u69df\u699420\u5e74\u8425\u9500\u53d1\u5bb6\u53f2","author_name":"\u5a31\u4e50\u8d44\u672c\u8bba","cover":"https:\/\/pic.36krcnd.com\/201903\/14024028\/zd9nc33z09vhis8b!heading","published_at":"2019-03-14 10:45:20","content":""},{"id":84471,"post_id":"5185104","title":"\u5ba1\u89c6\u7f8e\u56e2\uff1a\u4ec0\u4e48\u90fd\u60f3\u8981\uff0c\u5374\u4ec0\u4e48\u90fd\u96be\u4ee5\u8981\u5230","author_name":"\u950c\u523b\u5ea6","cover":"https:\/\/img.36krcdn.com\/20190313\/v2_1552484429618_img_000","published_at":"2019-03-14 10:31:06","content":""},{"id":84469,"post_id":"5185033","title":"\u623f\u5730\u4ea7\u7a0e\u8ba8\u8bba\u5f88\u591a\uff0c\u5bf9\u5e02\u573a\u5f71\u54cd\u6709\u9650","author_name":"\u6768\u73b0\u9886","cover":"https:\/\/pic.36krcnd.com\/201903\/13111156\/uvz4svalc72uq13d!heading","published_at":"2019-03-14 10:25:27","content":""},{"id":84470,"post_id":"5185042","title":"\u57ce\u5e02\u65f6\u5c1a\u9b45\u529b\u7efc\u5408\u6307\u6570\u62a5\u544a","author_name":"RET\u777f\u610f\u5fb7","cover":"https:\/\/img.36krcdn.com\/20190313\/v2_1552474819370_img_000","published_at":"2019-03-14 10:24:58","content":""},{"id":84467,"post_id":"5185231","title":"\u6211\u4e3a\u4ec0\u4e48\u653e\u5f03\u4f7f\u7528Uber\uff1f","author_name":"36\u6c2a\u7684\u670b\u53cb\u4eec","cover":"https:\/\/pic.36krcnd.com\/201903\/14020940\/c4cdxweyk9tuubmr!heading","published_at":"2019-03-14 10:15:47","content":""},{"id":84468,"post_id":"5185234","title":"\u89c6\u9891\u793e\u4ea4\u662f\u4e2a\u4f2a\u547d\u9898","author_name":"\u7231\u8303\u513f","cover":"https:\/\/pic.36krcnd.com\/201903\/14021301\/gahzhsngjnmyxqrl!heading","published_at":"2019-03-14 10:14:55","content":""},{"id":84466,"post_id":"5185090","title":"\u6fc0\u52b1\u89c6\u9891\uff1a\u4e92\u8054\u7f51\u5e7f\u544a\u7684\u65b0\u9ed1\u9a6c","author_name":"\u536b\u5915\u804a\u5e7f\u544a","cover":"https:\/\/img.36krcdn.com\/20190313\/v2_1552481795215_img_000","published_at":"2019-03-14 10:04:05","content":""},{"id":84463,"post_id":"5185218","title":"\u661f\u7403\u65e5\u62a5 | \u5f6d\u535a\u62a5\u544a\uff1a\u6bd4\u7279\u5e01\u53ef\u80fd\u4f1a\u518d\u6b21\u4e0b\u8dcc\uff1b\u4ee5\u592a\u574a PoS \u5c06\u5728\u6d4b\u8bd5\u7f51\u4e0a\u6d4b\u8bd5","author_name":"Odaily\u661f\u7403\u65e5\u62a5","cover":"https:\/\/pic.36krcnd.com\/201903\/14013857\/loqs1q55qqkc0yug!heading","published_at":"2019-03-14 09:57:11","content":""},{"id":84465,"post_id":"5185172","title":"\u6df1\u8bbf\u6768\u8d85\u8d8a\u676f\u7f16\u7a0b\u5927\u8d5b\u53d1\u8d77\u4eba\uff0c\u8fd8\u539f\u786c\u6838\u7c89\u4e1d\u8ffd\u661f\u5168\u8fc7\u7a0b","author_name":"\u523a\u732c\u516c\u793e","cover":"https:\/\/pic.36krcnd.com\/201903\/14013551\/nqc4h0happ8ofyh1!heading","published_at":"2019-03-14 09:48:56","content":""},{"id":84462,"post_id":"5185049","title":"\u79bb\u5f00\u4e86\u5e73\u53f0\uff0c\u4f60\u771f\u7684\u4ec0\u4e48\u90fd\u4e0d\u662f\u5417\uff1f","author_name":"\u778e\u8bf4\u804c\u573a","cover":"https:\/\/img.36krcdn.com\/20190313\/v2_1552475053796_img_000","published_at":"2019-03-14 09:41:05","content":""},{"id":84459,"post_id":"5185113","title":"KOL\u79cd\u8349\u8425\u9500\uff0c\u505a\u597d\u8fd93\u70b9\u5c31\u591f\u4e86","author_name":"\u4f20\u64ad\u4f53\u64cd","cover":"https:\/\/pic.36krcnd.com\/201903\/14003442\/tz3o3bpagyqhr550!heading","published_at":"2019-03-14 09:21:07","content":""},{"id":84460,"post_id":"5185193","title":"\u201c\u989c\u503c\u5b66\u9738\u201d\u5165\u5708\u8bb0","author_name":"\u58f9\u5a31\u89c2\u5bdf","cover":"https:\/\/pic.36krcnd.com\/201903\/14011613\/085unyg9mipxjzbv!heading","published_at":"2019-03-14 09:20:46","content":""}]';
	}
}